<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__File.php
 */

namespace Rehack;

final class Js_of_ocaml__File {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $Js_of_ocaml__Dom = Js_of_ocaml__Dom::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $Js_of_ocaml__Typed_array = Js_of_ocaml__Typed_array::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    Js_of_ocaml__File::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__File;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $filter_map = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_can_t_retrieve_file_name_not_implemented = $caml_new_string(
      "can't retrieve file name: not implemented"
    );
    $cst_endings = $caml_new_string("endings");
    $cst_type = $caml_new_string("type");
    $cst_loadstart = $caml_new_string("loadstart");
    $cst_progress = $caml_new_string("progress");
    $cst_abort = $caml_new_string("abort");
    $cst_error = $caml_new_string("error");
    $cst_load = $caml_new_string("load");
    $cst_loadend = $caml_new_string("loadend");
    $Js_of_ocaml_Typed_array = $global_data["Js_of_ocaml__Typed_array"];
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Pervasives = $global_data["Pervasives"];
    $List = $global_data["List_"];
    $Array = $global_data["Array_"];
    $Js_of_ocaml_Dom = $global_data["Js_of_ocaml__Dom"];
    $go = Vector{0, $caml_new_string("transparent")};
    $gp = Vector{0, $caml_new_string("native")};
    $gm = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -553417380, 86), $x);
    };
    $gn = $Js_of_ocaml_Js[50][1];
    $blob_constr = (function($t0, $param) {return $t0->Blob;})($gn, $gm);
    $filter_map->contents = function($f, $param) use ($caml_call1,$filter_map) {
      $param__0 = $param;
      $continue_counter = null;
      for (;;) {
        if ($param__0) {
          $q = $param__0[2];
          $v = $param__0[1];
          $match = $caml_call1($f, $v);
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
    $make_blob_options = function($contentType, $endings) use ($Array,$Js_of_ocaml_Js,$caml_call1,$cst_endings,$cst_type,$filter_map,$go,$gp,$runtime) {
      $gD = 0;
      if ($endings) {
        $gE = 116179762 <= $endings[1] ? $go : ($gp);
        $gF = $gE;
      }
      else {$gF = 0;}
      $gG = Vector{
        0,
        Vector{0, $cst_type, $contentType},
        Vector{0, Vector{0, $cst_endings, $gF}, $gD}
      };
      $options = $filter_map->contents(
        function($param) {
          $v = $param[2];
          $name = $param[1];
          if ($v) {
            $v__0 = $v[1];
            return Vector{0, Vector{0, $name, $v__0->toString()}};
          }
          return 0;
        },
        $gG
      );
      return $options
        ? $runtime["caml_js_object"]($caml_call1($Array[12], $options))
        : ($Js_of_ocaml_Js[3]);
    };
    $blob_raw = function($contentType, $endings, $a) use ($blob_constr,$make_blob_options,$runtime) {
      $options = $make_blob_options($contentType, $endings);
      $gB = 0;
      $gC = $runtime["caml_js_from_array"]($a);
      return (function($t3, $t1, $t2, $param) {return new $t3($t1, $t2);})($blob_constr, $gC, $options, $gB);
    };
    $blob_from_string = function($contentType, $endings, $s) use ($blob_raw) {
      return $blob_raw($contentType, $endings, Vector{0, $s->toString()});
    };
    $blob_from_any = function($contentType, $endings, $l) use ($Array,$List,$blob_raw,$caml_call1,$caml_call2) {
      $gz = function($param) {
        $gA = $param[1];
        if (155580615 === $gA) {$s = $param[2];return $s;}
        if (486041214 <= $gA) {
          if (1037850489 <= $gA) {$a = $param[2];return $a;}
          $a__0 = $param[2];
          return $a__0;
        }
        if (288368849 <= $gA) {$s__0 = $param[2];return $s__0->toString();}
        $b = $param[2];
        return $b;
      };
      $l__0 = $caml_call2($List[17], $gz, $l);
      return $blob_raw($contentType, $endings, $caml_call1($Array[12], $l__0));
    };
    $filename = function($file) use ($Js_of_ocaml_Js,$Pervasives,$caml_call1,$caml_get_public_method,$cst_can_t_retrieve_file_name_not_implemented) {
      $gv = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -922783157, 87), $x);
      };
      $gw = (function($t5, $param) {return $t5->name;})($file, $gv);
      $match = $caml_call1($Js_of_ocaml_Js[6][10], $gw);
      if ($match) {$name = $match[1];return $name;}
      $gx = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -498902297, 88), $x);
      };
      $gy = (function($t4, $param) {return $t4->fileName;})($file, $gx);
      $match__0 = $caml_call1($Js_of_ocaml_Js[6][10], $gy);
      if ($match__0) {$name__0 = $match__0[1];return $name__0;}
      return $caml_call1(
        $Pervasives[2],
        $cst_can_t_retrieve_file_name_not_implemented
      );
    };
    $gq = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 1012572826, 89), $x);
    };
    $gr = $Js_of_ocaml_Js[50][1];
    $doc_constr = (function($t6, $param) {return $t6->Document;})($gr, $gq);
    $document = function($e) use ($Js_of_ocaml_Js,$caml_call1,$doc_constr) {
      return instance_of($e, $doc_constr)
        ? $caml_call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $blob = function($e) use ($Js_of_ocaml_Js,$blob_constr,$caml_call1) {
      return instance_of($e, $blob_constr)
        ? $caml_call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $string = function($e) use ($Js_of_ocaml_Js,$caml_call1,$runtime) {
      return $runtime["caml_equal"](typeof($e), "string")
        ? $caml_call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $arrayBuffer = function($e) use ($Js_of_ocaml_Js,$Js_of_ocaml_Typed_array,$caml_call1) {
      return instance_of($e, $Js_of_ocaml_Typed_array[1])
        ? $caml_call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $loadstart = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_loadstart);
    $progress = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_progress);
    $abort = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_abort);
    $error = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_error);
    $load = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_load);
    $loadend = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_loadend);
    $ReaderEvent = Vector{
      0,
      $loadstart,
      $progress,
      $abort,
      $error,
      $load,
      $loadend
    };
    $gs = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 642825758, 90), $x);
    };
    $gt = $Js_of_ocaml_Js[50][1];
    $fileReader = (function($t7, $param) {return $t7->FileReader;})($gt, $gs);
    $addEventListener = $Js_of_ocaml_Dom[15];
    $Js_of_ocaml_File = Vector{
      0,
      $blob_from_string,
      $blob_from_any,
      Vector{
        0,
        $document,
        $blob,
        function($gu) {return $gu;},
        $string,
        $arrayBuffer
      },
      $ReaderEvent,
      $filename,
      $fileReader,
      $addEventListener
    };
    
    $runtime["caml_register_global"](
      23,
      $Js_of_ocaml_File,
      "Js_of_ocaml__File"
    );

  }
}