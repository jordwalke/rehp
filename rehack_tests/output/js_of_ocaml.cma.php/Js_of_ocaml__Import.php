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
    $String = String_::get();
    $Char = Char::get();
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
    $make = $String[1];
    $init = $String[2];
    $copy = $String[3];
    $sub = $String[4];
    $fill = $String[5];
    $blit = $String[6];
    $concat = $String[7];
    $iter = $String[8];
    $iteri = $String[9];
    $map = $String[10];
    $mapi = $String[11];
    $trim = $String[12];
    $escaped = $String[13];
    $index = $String[14];
    $index_opt = $String[15];
    $rindex = $String[16];
    $rindex_opt = $String[17];
    $index_from = $String[18];
    $index_from_opt = $String[19];
    $rindex_from = $String[20];
    $rindex_from_opt = $String[21];
    $contains = $String[22];
    $contains_from = $String[23];
    $rcontains_from = $String[24];
    $uppercase = $String[25];
    $lowercase = $String[26];
    $capitalize = $String[27];
    $uncapitalize = $String[28];
    $uppercase_ascii = $String[29];
    $lowercase_ascii = $String[30];
    $capitalize_ascii = $String[31];
    $uncapitalize_ascii = $String[32];
    $compare__0 = $String[33];
    $split_on_char = $String[35];
    $equal__0 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $runtime["caml_string_equal"]($x, $y);
    };
    $String__0 = Vector{
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
      $equal__0
    } as dynamic;
    $chr = $Char[1];
    $escaped__0 = $Char[2];
    $lowercase__0 = $Char[3];
    $uppercase__0 = $Char[4];
    $lowercase_ascii__0 = $Char[5];
    $uppercase_ascii__0 = $Char[6];
    $compare__1 = $Char[7];
    $equal__1 = (dynamic $x, dynamic $y) : dynamic ==> {
      return $x === $y ? 1 : (0);
    };
    $Char__0 = Vector{
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
      $String__0,
      $Char__0,
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
