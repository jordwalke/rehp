<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Sys_js.php
 */

namespace Rehack;

final class Js_of_ocaml__Sys_js {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $Js_of_ocaml__Lib_version = Js_of_ocaml__Lib_version::get();
    $Pervasives = Pervasives::get();
    Js_of_ocaml__Sys_js::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Sys_js;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_js_wrap_callback = $runtime["caml_js_wrap_callback"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst = $string("");
    $cst__0 = $string("+");
    $Pervasives = $global_data["Pervasives"];
    $Js_of_ocaml_Lib_version = $global_data["Js_of_ocaml__Lib_version"];
    $update_file = function(dynamic $name, dynamic $content) use ($Pervasives,$call1,$call2) {
      $oc = $call1($Pervasives[48], $name);
      $call2($Pervasives[54], $oc, $content);
      return $call1($Pervasives[64], $oc);
    };
    $set_channel_flusher = function(dynamic $out_channel, dynamic $f) use ($call1,$caml_js_wrap_callback,$runtime) {
      $f__0 = $caml_js_wrap_callback(
        function(dynamic $s) use ($call1,$f,$runtime) {
          return $call1($f, $runtime["caml_js_to_byte_string"]($s));
        }
      );
      return $runtime["caml_ml_set_channel_output"]($out_channel, $f__0);
    };
    $set_channel_filler = function(dynamic $in_channel, dynamic $f) use ($caml_js_wrap_callback,$runtime) {
      $f__0 = $caml_js_wrap_callback($f);
      return $runtime["caml_ml_set_channel_refill"]($in_channel, $f__0);
    };
    $mount = function(dynamic $path, dynamic $f) use ($call2,$caml_js_wrap_callback,$runtime) {
      return $runtime["caml_mount_autoload"](
        $path,
        $caml_js_wrap_callback(
          function(dynamic $prefix, dynamic $path) use ($call2,$f) {
            return $call2($f, $prefix, $path);
          }
        )
      );
    };
    $unmount = function(dynamic $path) use ($runtime) {
      return $runtime["caml_unmount"]($path);
    };
    
    if ($runtime["caml_string_equal"]($Js_of_ocaml_Lib_version[2], $cst)) {$js_of_ocaml_version = $Js_of_ocaml_Lib_version[1];}
    else {
      $c = $call2($Pervasives[16], $cst__0, $Js_of_ocaml_Lib_version[2]);
      $js_of_ocaml_version = $call2(
        $Pervasives[16],
        $Js_of_ocaml_Lib_version[1],
        $c
      );
    }
    
    $a = function(dynamic $g, dynamic $f) use ($runtime) {
      return $runtime["caml_create_file"]($g, $f);
    };
    $b = function(dynamic $e) use ($runtime) {
      return $runtime["caml_read_file_content"]($e);
    };
    $Js_of_ocaml_Sys_js = Vector{
      0,
      $set_channel_flusher,
      $set_channel_filler,
      function(dynamic $d) use ($runtime) {
        return $runtime["caml_list_mount_point"]($d);
      },
      $unmount,
      $mount,
      $b,
      $a,
      $update_file,
      $js_of_ocaml_version
    };
    
    $runtime["caml_register_global"](
      4,
      $Js_of_ocaml_Sys_js,
      "Js_of_ocaml__Sys_js"
    );

  }
}

