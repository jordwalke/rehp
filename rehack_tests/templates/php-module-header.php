<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * ____CompilationUnitName.php
 */

namespace Rehack;

final class ____CompilationUnitName {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $____ForEachDependencyCompilationUnitName = ____ForEachDependencyCompilationUnitName::get();
    ____CompilationUnitName::load($global_object);
    $memoized = $runtime->caml_get_global_data()->____CompilationUnitName;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    /*____CompilationOutput*/
  }
}

/*____hashes*/
