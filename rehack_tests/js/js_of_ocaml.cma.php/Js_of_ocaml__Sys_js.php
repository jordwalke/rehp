<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Sys_js {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_js_wrap_callback = $runtime["caml_js_wrap_callback"];
    $string = $runtime["caml_new_string"];
    $cst = $string("");
    $cst__0 = $string("+");
    $Pervasives =  Pervasives::requireModule ();
    $Js_of_ocaml_Lib_version =  Js_of_ocaml__Lib_version::requireModule ();
    $update_file = (dynamic $name, dynamic $content) ==> {
      $oc = $call1($Pervasives[48], $name);
      $call2($Pervasives[54], $oc, $content);
      return $call1($Pervasives[64], $oc);
    };
    $set_channel_flusher = (dynamic $out_channel, dynamic $f) ==> {
      $f__0 = $caml_js_wrap_callback(
        (dynamic $s) ==> {
          return $call1($f, $runtime["caml_js_to_byte_string"]($s));
        }
      );
      return $runtime["caml_ml_set_channel_output"]($out_channel, $f__0);
    };
    $set_channel_filler = (dynamic $in_channel, dynamic $f) ==> {
      $f__0 = $caml_js_wrap_callback($f);
      return $runtime["caml_ml_set_channel_refill"]($in_channel, $f__0);
    };
    $mount = (dynamic $path, dynamic $f) ==> {
      return $runtime["caml_mount_autoload"](
        $path,
        $caml_js_wrap_callback(
          (dynamic $prefix, dynamic $path) ==> {
            return $call2($f, $prefix, $path);
          }
        )
      );
    };
    $unmount = (dynamic $path) ==> {return $runtime["caml_unmount"]($path);};
    
    if ($runtime["caml_string_equal"]($Js_of_ocaml_Lib_version[2], $cst)) {$js_of_ocaml_version = $Js_of_ocaml_Lib_version[1];}
    else {
      $c_ = $call2($Pervasives[16], $cst__0, $Js_of_ocaml_Lib_version[2]);
      $js_of_ocaml_version = $call2(
        $Pervasives[16],
        $Js_of_ocaml_Lib_version[1],
        $c_
      );
    }
    
    $a_ = (dynamic $g_, dynamic $f_) ==> {
      return $runtime["caml_create_file"]($g_, $f_);
    };
    $b_ = (dynamic $e_) ==> {return $runtime["caml_read_file_content"]($e_);};
    $Js_of_ocaml_Sys_js = Vector{
      0,
      $set_channel_flusher,
      $set_channel_filler,
      (dynamic $d_) ==> {return $runtime["caml_list_mount_point"]($d_);},
      $unmount,
      $mount,
      $b_,
      $a_,
      $update_file,
      $js_of_ocaml_version
    } as dynamic;
    
     return ($Js_of_ocaml_Sys_js);

  }
  public static function set_channel_flusher(dynamic $out_channel, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$out_channel, $f]);
  }
  public static function set_channel_filler(dynamic $in_channel, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$in_channel, $f]);
  }
  public static function unmount(dynamic $path): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$path]);
  }
  public static function mount(dynamic $path, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$path, $f]);
  }
  public static function update_file(dynamic $name, dynamic $content): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$name, $content]);
  }

}
/* Hashing disabled */
