<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class StringHelper {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $helperVal = $runtime["caml_new_string"]("hello");
    $StringHelper = Vector{0, $helperVal} as dynamic;
    
     return ($StringHelper);

  }

}
/* Hashing disabled */
