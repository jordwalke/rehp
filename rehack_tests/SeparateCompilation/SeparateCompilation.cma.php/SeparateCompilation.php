<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class SeparateCompilation {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $SeparateCompilation_SeparateCompilationHelper =  SeparateCompilation__SeparateCompilationHelper::requireModule (
      
    );
    $Pervasives =  Pervasives::requireModule ();
    $MyLib =  MyLib::requireModule ();
    
    $call1($Pervasives[34], $SeparateCompilation_SeparateCompilationHelper[1]);
    
    $call1($Pervasives[30], $runtime["caml_js_to_string"]($MyLib[2]));
    
    $SeparateCompilation = Vector{0} as dynamic;
    
     return ($SeparateCompilation);

  }

}
/*____hashes flags: 421562097 bytecode: 10647412249 debug-data: 1986690936 primitives: 1058613066*/
