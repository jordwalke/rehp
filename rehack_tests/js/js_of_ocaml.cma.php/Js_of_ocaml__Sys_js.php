<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Sys_js {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_js_wrap_callback = $runtime["caml_js_wrap_callback"];
    $string = $runtime["caml_new_string"];
    $cst = $string("");
    $cst__0 = $string("+");
    $Pervasives =  Pervasives::get ();
    $Js_of_ocaml_Lib_version =  Js_of_ocaml__Lib_version::get ();
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
      $c_ = $call2($Pervasives[16], $cst__0, $Js_of_ocaml_Lib_version[2]);
      $js_of_ocaml_version = $call2(
        $Pervasives[16],
        $Js_of_ocaml_Lib_version[1],
        $c_
      );
    }
    
    $a_ = function(dynamic $g_, dynamic $f_) use ($runtime) {
      return $runtime["caml_create_file"]($g_, $f_);
    };
    $b_ = function(dynamic $e_) use ($runtime) {
      return $runtime["caml_read_file_content"]($e_);
    };
    $Js_of_ocaml_Sys_js = Vector{
      0,
      $set_channel_flusher,
      $set_channel_filler,
      function(dynamic $d_) use ($runtime) {
        return $runtime["caml_list_mount_point"]($d_);
      },
      $unmount,
      $mount,
      $b_,
      $a_,
      $update_file,
      $js_of_ocaml_version
    };
    
     return ($Js_of_ocaml_Sys_js);

  }
  public static function js_of_ocaml_version() {
    return static::get()[9]();
  }
  public static function update_file(dynamic $name, dynamic $content) {
    return static::get()[8]($name, $content);
  }
  public static function mount(dynamic $path, dynamic $f) {
    return static::get()[5]($path, $f);
  }
  public static function unmount(dynamic $path) {
    return static::get()[4]($path);
  }
  public static function set_channel_filler(dynamic $in_channel, dynamic $f) {
    return static::get()[2]($in_channel, $f);
  }
  public static function set_channel_flusher(dynamic $out_channel, dynamic $f) {
    return static::get()[1]($out_channel, $f);
  }

}
/* Hashing disabled */
