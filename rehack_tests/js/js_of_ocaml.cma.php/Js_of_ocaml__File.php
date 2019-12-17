<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__File {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $filter_map = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string__0 = $runtime["caml_new_string"];
    $cst_can_t_retrieve_file_name_not_implemented = $string__0(
      "can't retrieve file name: not implemented"
    );
    $cst_endings = $string__0("endings");
    $cst_type = $string__0("type");
    $cst_loadstart = $string__0("loadstart");
    $cst_progress = $string__0("progress");
    $cst_abort = $string__0("abort");
    $cst_error = $string__0("error");
    $cst_load = $string__0("load");
    $cst_loadend = $string__0("loadend");
    $Js_of_ocaml_Typed_array =  Js_of_ocaml__Typed_array::get ();
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Pervasives =  Pervasives::get ();
    $List =  List_::get ();
    $Array =  Array_::get ();
    $Js_of_ocaml_Dom =  Js_of_ocaml__Dom::get ();
    $c_ = Vector{0, $string__0("transparent")};
    $d_ = Vector{0, $string__0("native")};
    $a_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -553417380, 62), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $blob_constr = (function(dynamic $t0, dynamic $param) {return $t0->Blob;})($b_, $a_);
    $filter_map->contents = function(dynamic $f, dynamic $param) use ($call1,$filter_map) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $q = $param__0[2];
          $v = $param__0[1];
          $match = $call1($f, $v);
          if ($match) {
            $v__0 = $match[1];
            return Vector{0, $v__0, $filter_map->contents($f, $q)};
          }
          $param__0 = $q;
          continue;
        }
        return 0;
      }
    };
    $make_blob_options = function(dynamic $contentType, dynamic $endings) use ($Array,$Js_of_ocaml_Js,$c_,$call1,$cst_endings,$cst_type,$d_,$filter_map,$runtime) {
      $r_ = 0;
      if ($endings) {
        $s_ = 116179762 <= $endings[1] ? $c_ : ($d_);
        $t_ = $s_;
      }
      else {$t_ = 0;}
      $u_ = Vector{
        0,
        Vector{0, $cst_type, $contentType},
        Vector{0, Vector{0, $cst_endings, $t_}, $r_}
      };
      $options = $filter_map->contents(
        function(dynamic $param) {
          $v = $param[2];
          $name = $param[1];
          if ($v) {
            $v__0 = $v[1];
            return Vector{0, Vector{0, $name, $v__0->toString()}};
          }
          return 0;
        },
        $u_
      );
      return $options
        ? $runtime["caml_js_object"]($call1($Array[12], $options))
        : ($Js_of_ocaml_Js[3]);
    };
    $blob_raw = function(dynamic $contentType, dynamic $endings, dynamic $a) use ($blob_constr,$make_blob_options,$runtime) {
      $options = $make_blob_options($contentType, $endings);
      $p_ = 0;
      $q_ = $runtime["caml_js_from_array"]($a);
      return (function(dynamic $t3, dynamic $t1, dynamic $t2, dynamic $param) {return new $t3($t1, $t2);
       })($blob_constr, $q_, $options, $p_);
    };
    $blob_from_string = function
    (dynamic $contentType, dynamic $endings, dynamic $s) use ($blob_raw) {
      return $blob_raw($contentType, $endings, Vector{0, $s->toString()});
    };
    $blob_from_any = function
    (dynamic $contentType, dynamic $endings, dynamic $l) use ($Array,$List,$blob_raw,$call1,$call2) {
      $n_ = function(dynamic $param) {
        $o_ = $param[1];
        if (155580615 === $o_) {$s = $param[2];return $s;}
        if (486041214 <= $o_) {
          if (1037850489 <= $o_) {$a = $param[2];return $a;}
          $a__0 = $param[2];
          return $a__0;
        }
        if (288368849 <= $o_) {$s__0 = $param[2];return $s__0->toString();}
        $b = $param[2];
        return $b;
      };
      $l__0 = $call2($List[17], $n_, $l);
      return $blob_raw($contentType, $endings, $call1($Array[12], $l__0));
    };
    $filename = function(dynamic $file) use ($Js_of_ocaml_Js,$Pervasives,$call1,$caml_get_public_method,$cst_can_t_retrieve_file_name_not_implemented) {
      $j_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -922783157, 63), $x);
      };
      $k_ = (function(dynamic $t5, dynamic $param) {return $t5->name;})($file, $j_);
      $match = $call1($Js_of_ocaml_Js[6][10], $k_);
      if ($match) {$name = $match[1];return $name;}
      $l_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -498902297, 64), $x);
      };
      $m_ = (function(dynamic $t4, dynamic $param) {return $t4->fileName;})($file, $l_);
      $match__0 = $call1($Js_of_ocaml_Js[6][10], $m_);
      if ($match__0) {$name__0 = $match__0[1];return $name__0;}
      return $call1(
        $Pervasives[2],
        $cst_can_t_retrieve_file_name_not_implemented
      );
    };
    $e_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 1012572826, 65), $x);
    };
    $f_ = $Js_of_ocaml_Js[50][1];
    $doc_constr = (function(dynamic $t6, dynamic $param) {return $t6->Document;
     })($f_, $e_);
    $document = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$doc_constr) {
      return instance_of($e, $doc_constr)
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $blob = function(dynamic $e) use ($Js_of_ocaml_Js,$blob_constr,$call1) {
      return instance_of($e, $blob_constr)
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $string = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$runtime) {
      return $runtime["caml_equal"](typeof($e), "string")
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $arrayBuffer = function(dynamic $e) use ($Js_of_ocaml_Js,$Js_of_ocaml_Typed_array,$call1) {
      return instance_of($e, $Js_of_ocaml_Typed_array[1])
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $loadstart = $call1($Js_of_ocaml_Dom[14][1], $cst_loadstart);
    $progress = $call1($Js_of_ocaml_Dom[14][1], $cst_progress);
    $abort = $call1($Js_of_ocaml_Dom[14][1], $cst_abort);
    $error = $call1($Js_of_ocaml_Dom[14][1], $cst_error);
    $load = $call1($Js_of_ocaml_Dom[14][1], $cst_load);
    $loadend = $call1($Js_of_ocaml_Dom[14][1], $cst_loadend);
    $ReaderEvent = Vector{
      0,
      $loadstart,
      $progress,
      $abort,
      $error,
      $load,
      $loadend
    };
    $g_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 642825758, 66), $x);
    };
    $h_ = $Js_of_ocaml_Js[50][1];
    $fileReader = (function(dynamic $t7, dynamic $param) {return $t7->FileReader;
     })($h_, $g_);
    $addEventListener = $Js_of_ocaml_Dom[15];
    $Js_of_ocaml_File = Vector{
      0,
      $blob_from_string,
      $blob_from_any,
      Vector{
        0,
        $document,
        $blob,
        function(dynamic $i_) {return $i_;},
        $string,
        $arrayBuffer
      },
      $ReaderEvent,
      $filename,
      $fileReader,
      $addEventListener
    };
    
     return ($Js_of_ocaml_File);

  }
  public static function addEventListener() {
    return static::get()[7]();
  }
  public static function fileReader() {
    return static::get()[6]();
  }
  public static function filename(dynamic $file) {
    return static::get()[5]($file);
  }
  public static function ReaderEvent() {
    return static::get()[4]();
  }
  public static function blob_from_any(dynamic $contentType, dynamic $endings, dynamic $l) {
    return static::get()[2]($contentType, $endings, $l);
  }
  public static function blob_from_string(dynamic $contentType, dynamic $endings, dynamic $s) {
    return static::get()[1]($contentType, $endings, $s);
  }

}
/* Hashing disabled */
