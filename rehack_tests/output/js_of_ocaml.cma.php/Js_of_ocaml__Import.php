<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Import {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $Stdlib_string = Stdlib__string::get();
    $Stdlib_char = Stdlib__char::get();
    $Poly = Vector{0} as dynamic;
    $symbol = (dynamic $x, dynamic $y) : dynamic ==> {
      return $x < $y ? 1 : (0);
    };
    $symbol__0 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $x <= $y ? 1 : (0);
    };
    $symbol__1 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $x !== $y ? 1 : (0);
    };
    $symbol__2 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $x === $y ? 1 : (0);
    };
    $symbol__3 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $y < $x ? 1 : (0);
    };
    $symbol__4 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $y <= $x ? 1 : (0);
    };
    $compare = (dynamic $x, dynamic $y) : dynamic ==> {
      return $runtime["caml_int_compare"]($x, $y);
    };
    $equal = (dynamic $x, dynamic $y) : dynamic ==> {
      return $symbol__2($x, $y);
    };
    $max = (dynamic $x, dynamic $y) : dynamic ==> {
      return $symbol__4($x, $y) ? $x : ($y);
    };
    $min = (dynamic $x, dynamic $y) : dynamic ==> {
      return $symbol__0($x, $y) ? $x : ($y);
    };
    $Int_replace_polymorphic_compare = Vector{
      0,
      $symbol,
      $symbol__0,
      $symbol__1,
      $symbol__2,
      $symbol__3,
      $symbol__4,
      $compare,
      $equal,
      $max,
      $min
    } as dynamic;
    $make = $Stdlib_string[1];
    $init = $Stdlib_string[2];
    $copy = $Stdlib_string[3];
    $sub = $Stdlib_string[4];
    $fill = $Stdlib_string[5];
    $blit = $Stdlib_string[6];
    $concat = $Stdlib_string[7];
    $iter = $Stdlib_string[8];
    $iteri = $Stdlib_string[9];
    $map = $Stdlib_string[10];
    $mapi = $Stdlib_string[11];
    $trim = $Stdlib_string[12];
    $escaped = $Stdlib_string[13];
    $index = $Stdlib_string[14];
    $index_opt = $Stdlib_string[15];
    $rindex = $Stdlib_string[16];
    $rindex_opt = $Stdlib_string[17];
    $index_from = $Stdlib_string[18];
    $index_from_opt = $Stdlib_string[19];
    $rindex_from = $Stdlib_string[20];
    $rindex_from_opt = $Stdlib_string[21];
    $contains = $Stdlib_string[22];
    $contains_from = $Stdlib_string[23];
    $rcontains_from = $Stdlib_string[24];
    $uppercase = $Stdlib_string[25];
    $lowercase = $Stdlib_string[26];
    $capitalize = $Stdlib_string[27];
    $uncapitalize = $Stdlib_string[28];
    $uppercase_ascii = $Stdlib_string[29];
    $lowercase_ascii = $Stdlib_string[30];
    $capitalize_ascii = $Stdlib_string[31];
    $uncapitalize_ascii = $Stdlib_string[32];
    $compare__0 = $Stdlib_string[33];
    $split_on_char = $Stdlib_string[35];
    $to_seq = $Stdlib_string[36];
    $to_seqi = $Stdlib_string[37];
    $of_seq = $Stdlib_string[38];
    $equal__0 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $runtime["caml_string_equal"]($x, $y);
    };
    $String = Vector{
      0,
      $make,
      $init,
      $copy,
      $sub,
      $fill,
      $blit,
      $concat,
      $iter,
      $iteri,
      $map,
      $mapi,
      $trim,
      $escaped,
      $index,
      $index_opt,
      $rindex,
      $rindex_opt,
      $index_from,
      $index_from_opt,
      $rindex_from,
      $rindex_from_opt,
      $contains,
      $contains_from,
      $rcontains_from,
      $uppercase,
      $lowercase,
      $capitalize,
      $uncapitalize,
      $uppercase_ascii,
      $lowercase_ascii,
      $capitalize_ascii,
      $uncapitalize_ascii,
      $compare__0,
      $split_on_char,
      $to_seq,
      $to_seqi,
      $of_seq,
      $equal__0
    } as dynamic;
    $chr = $Stdlib_char[1];
    $escaped__0 = $Stdlib_char[2];
    $lowercase__0 = $Stdlib_char[3];
    $uppercase__0 = $Stdlib_char[4];
    $lowercase_ascii__0 = $Stdlib_char[5];
    $uppercase_ascii__0 = $Stdlib_char[6];
    $compare__1 = $Stdlib_char[7];
    $equal__1 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $x === $y ? 1 : (0);
    };
    $Char = Vector{
      0,
      $chr,
      $escaped__0,
      $lowercase__0,
      $uppercase__0,
      $lowercase_ascii__0,
      $uppercase_ascii__0,
      $compare__1,
      $equal__1
    } as dynamic;
    $symbol__5 = $Int_replace_polymorphic_compare[1];
    $symbol__6 = $Int_replace_polymorphic_compare[2];
    $symbol__7 = $Int_replace_polymorphic_compare[3];
    $symbol__8 = $Int_replace_polymorphic_compare[4];
    $symbol__9 = $Int_replace_polymorphic_compare[5];
    $symbol__10 = $Int_replace_polymorphic_compare[6];
    $compare__2 = $Int_replace_polymorphic_compare[7];
    $equal__2 = $Int_replace_polymorphic_compare[8];
    $max__0 = $Int_replace_polymorphic_compare[9];
    $min__0 = $Int_replace_polymorphic_compare[10];
    $Js_of_ocaml_Import = Vector{
      0,
      $Poly,
      $Int_replace_polymorphic_compare,
      $String,
      $Char,
      $symbol__5,
      $symbol__6,
      $symbol__7,
      $symbol__8,
      $symbol__9,
      $symbol__10,
      $compare__2,
      $equal__2,
      $max__0,
      $min__0
    } as dynamic;
    
    return($Js_of_ocaml_Import);

  }

}
/* Hashing disabled */
