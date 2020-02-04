<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class SeparateCompilation {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $SeparateCompilation_SeparateCompilationHelper = SeparateCompilation__SeparateCompilationHelper::get(
      
    );
    $Pervasives = Pervasives::get();
    $MyLib = MyLib::get();
    
    $call1($Pervasives[34], $SeparateCompilation_SeparateCompilationHelper[1]);
    
    $call1($Pervasives[30], $runtime["caml_js_to_string"]($MyLib[2]));
    
    $SeparateCompilation = Vector{0} as dynamic;
    
    return($SeparateCompilation);

  }

}
/*____hashes flags: 1314811087 bytecode: 10647412249 debug-data: 2652172024 primitives: 1058613066*/
