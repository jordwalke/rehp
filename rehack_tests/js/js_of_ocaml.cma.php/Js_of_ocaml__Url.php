<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Url.php
 */

namespace Rehack;

final class Js_of_ocaml__Url {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $CamlinternalOO = CamlinternalOO::get();
    $Js_of_ocaml__Dom_html = Js_of_ocaml__Dom_html::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $Js_of_ocaml__Regexp = Js_of_ocaml__Regexp::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $String_ = String_::get();
    $Failure = Failure::get();
    $Not_found = Not_found::get();
    Js_of_ocaml__Url::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Url;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_fresh_oo_id = $runtime["caml_fresh_oo_id"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_int_of_string = $runtime["caml_int_of_string"];
    $caml_js_to_byte_string = $runtime["caml_js_to_byte_string"];
    $caml_js_wrap_meth_callback = $runtime["caml_js_wrap_meth_callback"];
    $caml_jsbytes_of_string = $runtime["caml_jsbytes_of_string"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
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
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst__36 = $caml_new_string("");
    $cst__37 = $caml_new_string("");
    $cst__12 = $caml_new_string("");
    $cst__20 = $caml_new_string("");
    $cst__13 = $caml_new_string("#");
    $cst__14 = $caml_new_string("?");
    $cst__19 = $caml_new_string("");
    $cst__15 = $caml_new_string("/");
    $cst__16 = $caml_new_string("/");
    $cst__18 = $caml_new_string(":");
    $cst__17 = $caml_new_string("");
    $cst_http__1 = $caml_new_string("http://");
    $cst__21 = $caml_new_string("");
    $cst__29 = $caml_new_string("");
    $cst__22 = $caml_new_string("#");
    $cst__23 = $caml_new_string("?");
    $cst__28 = $caml_new_string("");
    $cst__24 = $caml_new_string("/");
    $cst__25 = $caml_new_string("/");
    $cst__27 = $caml_new_string(":");
    $cst__26 = $caml_new_string("");
    $cst_https__1 = $caml_new_string("https://");
    $cst__30 = $caml_new_string("");
    $cst__35 = $caml_new_string("");
    $cst__31 = $caml_new_string("#");
    $cst__32 = $caml_new_string("?");
    $cst__34 = $caml_new_string("");
    $cst__33 = $caml_new_string("/");
    $cst_file__1 = $caml_new_string("file://");
    $cst__11 = $caml_new_string("");
    $cst__10 = $caml_new_string("");
    $cst__9 = $caml_new_string("");
    $cst__8 = $caml_new_string("");
    $cst__7 = $caml_new_string("");
    $cst__6 = $caml_new_string("");
    $cst__5 = $caml_new_string("");
    $cst__3 = $caml_new_string("=");
    $cst__4 = $caml_new_string("&");
    $cst__1 = $caml_new_string("");
    $cst__2 = $caml_new_string("");
    $cst_file = $caml_new_string("file");
    $cst_file__0 = $caml_new_string("file:");
    $cst_http = $caml_new_string("http");
    $cst_http__0 = $caml_new_string("http:");
    $cst_https = $caml_new_string("https");
    $cst_https__0 = $caml_new_string("https:");
    $cst__0 = $caml_new_string(" ");
    $cst_2B = $caml_new_string("%2B");
    $shared = Vector{
      0,
      $caml_new_string("hash"),
      $caml_new_string("host"),
      $caml_new_string("href"),
      $caml_new_string("port"),
      $caml_new_string("origin"),
      $caml_new_string("assign"),
      $caml_new_string("hostname"),
      $caml_new_string("pathname"),
      $caml_new_string("search"),
      $caml_new_string("protocol"),
      $caml_new_string("reload"),
      $caml_new_string("replace")
    };
    $cst_Js_of_ocaml_Url_Local_exn = $caml_new_string(
      "Js_of_ocaml__Url.Local_exn"
    );
    $cst = $caml_new_string("+");
    $cst_Js_of_ocaml_Url_Not_an_http_protocol = $caml_new_string(
      "Js_of_ocaml__Url.Not_an_http_protocol"
    );
    $cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9 = $caml_new_string(
      "^([Hh][Tt][Tt][Pp][Ss]?)://([0-9a-zA-Z.-]+|\\[[0-9a-zA-Z.-]+\\]|\\[[0-9A-Fa-f:.]+\\])?(:([0-9]+))?(/([^\\?#]*)(\\?([^#]*))?(#(.*))?)?\\$"
    );
    $cst_Ff_Ii_Ll_Ee = $caml_new_string(
      "^([Ff][Ii][Ll][Ee])://([^\\?#]*)(\\?([^#]*))?(#(.*))?\\$"
    );
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Failure = $global_data["Failure"];
    $CamlinternalOO = $global_data["CamlinternalOO"];
    $Pervasives = $global_data["Pervasives"];
    $List = $global_data["List_"];
    $String = $global_data["String_"];
    $Not_found = $global_data["Not_found"];
    $Js_of_ocaml_Regexp = $global_data["Js_of_ocaml__Regexp"];
    $Js_of_ocaml_Dom_html = $global_data["Js_of_ocaml__Dom_html"];
    $p3 = Vector{0, $caml_new_string(""), 0};
    $pY = Vector{
      0,
      $caml_new_string("search"),
      $caml_new_string("replace"),
      $caml_new_string("reload"),
      $caml_new_string("protocol"),
      $caml_new_string("port"),
      $caml_new_string("pathname"),
      $caml_new_string("origin"),
      $caml_new_string("href"),
      $caml_new_string("hostname"),
      $caml_new_string("host"),
      $caml_new_string("hash"),
      $caml_new_string("assign")
    };
    $split = function($c, $s) use ($Js_of_ocaml_Js,$String,$caml_call1,$caml_call2,$caml_get_public_method) {
      $s0 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 24046298, 267), $x);
      };
      $s1 = $caml_call2($String[1], 1, $c)->toString();
      $s2 = (function($t1, $t0, $param) {return $t1->split($t0);})($s, $s1, $s0);
      return $caml_call1($Js_of_ocaml_Js[20], $s2);
    };
    $split_2 = function($c, $s) use ($Js_of_ocaml_Js,$String,$caml_call1,$caml_call2,$caml_get_public_method) {
      $sS = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -524334903, 268), $x);
      };
      $sT = $caml_call2($String[1], 1, $c)->toString();
      $index = (function($t8, $t7, $param) {return $t8->indexOf($t7);})($s, $sT, $sS);
      if (0 <= $index) {
        $sU = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -303194578, 269), $x);
        };
        $sV = (int) ($index + 1);
        $sW = (function($t6, $t5, $param) {return $t6->slice($t5);})($s, $sV, $sU);
        $sX = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -20462510, 270), $x);
        };
        $sY = 0;
        $sZ = Vector{
          0,
          (function($t4, $t2, $t3, $param) {return $t4->slice($t2, $t3);})($s, $sY, $index, $sX),
          $sW
        };
        return $caml_call1($Js_of_ocaml_Js[4], $sZ);
      }
      return $Js_of_ocaml_Js[3];
    };
    $Local_exn = Vector{
      248,
      $cst_Js_of_ocaml_Url_Local_exn,
      $caml_fresh_oo_id(0)
    };
    $interrupt = function($param) use ($Local_exn,$runtime) {
      throw $runtime["caml_wrap_thrown_exception"]($Local_exn) as \Throwable;
    };
    $plus_re = $caml_call1($Js_of_ocaml_Regexp[5], $cst);
    $escape_plus = function($s) use ($Js_of_ocaml_Regexp,$caml_call3,$cst_2B,$plus_re) {
      return $caml_call3($Js_of_ocaml_Regexp[12], $plus_re, $s, $cst_2B);
    };
    $unescape_plus = function($s) use ($Js_of_ocaml_Regexp,$caml_call3,$cst__0,$plus_re) {
      return $caml_call3($Js_of_ocaml_Regexp[12], $plus_re, $s, $cst__0);
    };
    $pZ = 0;
    $p0 = "g";
    $p1 = "\\+";
    $p2 = $Js_of_ocaml_Js[11];
    $plus_re_js_string = (function($t11, $t9, $t10, $param) {return new $t11($t9, $t10);
     })($p2, $p1, $p0, $pZ);
    $unescape_plus_js_string = function($s) use ($caml_call1,$caml_get_public_method,$plus_re_js_string) {
      $sO = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 180472028, 271), $x);
      };
      $sP = 0;
      ((function($t16, $t15, $param) {return $t16->lastIndex = $t15;})($plus_re_js_string, $sP, $sO));
      $sQ = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 724060212, 272), $x);
      };
      $sR = " ";
      return (function($t14, $t12, $t13, $param) {
         return $t14->replace($t12, $t13);
       })($s, $plus_re_js_string, $sR, $sQ);
    };
    $urldecode_js_string_string = function($s) use ($Js_of_ocaml_Js,$caml_call1,$caml_js_to_byte_string,$unescape_plus_js_string) {
      $sN = $unescape_plus_js_string($s);
      return $caml_js_to_byte_string($caml_call1($Js_of_ocaml_Js[42], $sN));
    };
    $urldecode = function($s) use ($Js_of_ocaml_Js,$caml_call1,$caml_js_to_byte_string,$caml_jsbytes_of_string,$unescape_plus) {
      $sM = $caml_jsbytes_of_string($unescape_plus($s));
      return $caml_js_to_byte_string($caml_call1($Js_of_ocaml_Js[42], $sM));
    };
    $urlencode = function($opt, $s) use ($Js_of_ocaml_Js,$caml_call1,$caml_js_to_byte_string,$caml_jsbytes_of_string,$escape_plus) {
      if ($opt) {
        $sth = $opt[1];
        $with_plus = $sth;
      }
      else {$with_plus = 1;}
      return $with_plus
        ? $escape_plus(
         $caml_js_to_byte_string(
           $caml_call1($Js_of_ocaml_Js[41], $caml_jsbytes_of_string($s))
         )
       )
        : ($caml_js_to_byte_string(
         $caml_call1($Js_of_ocaml_Js[41], $caml_jsbytes_of_string($s))
       ));
    };
    $Not_an_http_protocol = Vector{
      248,
      $cst_Js_of_ocaml_Url_Not_an_http_protocol,
      $caml_fresh_oo_id(0)
    };
    $is_secure = function($prot_string) use ($Not_an_http_protocol,$caml_call1,$caml_get_public_method,$caml_js_to_byte_string,$caml_string_notequal,$cst_file,$cst_file__0,$cst_http,$cst_http__0,$cst_https,$cst_https__0,$runtime) {
      $sL = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 946097238, 273), $x);
      };
      $match = $caml_js_to_byte_string(
        (function($t17, $param) {return $t17->toLowerCase();})($prot_string, $sL)
      );
      if ($caml_string_notequal($match, $cst_file)) {
        if ($caml_string_notequal($match, $cst_file__0)) {
          if ($caml_string_notequal($match, $cst_http)) {
            if ($caml_string_notequal($match, $cst_http__0)) {
              if ($caml_string_notequal($match, $cst_https)) {
                if ($caml_string_notequal($match, $cst_https__0)) {$switch__0 = 1;$switch__1 = 0;}
                else {$switch__1 = 1;}
              }
              else {$switch__1 = 1;}
              if ($switch__1) {return 1;}
            }
            else {$switch__0 = 0;}
          }
          else {$switch__0 = 0;}
          if (! $switch__0) {return 0;}
        }
      }
      throw $runtime["caml_wrap_thrown_exception"]($Not_an_http_protocol) as \Throwable;
    };
    $default_http_port = 80;
    $default_https_port = 443;
    $path_of_path_string = function($s) use ($Not_found,$String,$caml_call3,$caml_string_notequal,$caml_wrap_exception,$cst__1,$cst__2,$p3,$runtime) {
      $aux = new Ref();
      $l = $runtime["caml_ml_string_length"]($s);
      $aux->contents = function($i) use ($Not_found,$String,$aux,$caml_call3,$caml_wrap_exception,$l,$runtime,$s) {
        try {$sJ = $caml_call3($String[18], $s, $i, 47);$j = $sJ;}
        catch(\Throwable $sK) {
          $sK = $caml_wrap_exception($sK);
          if ($sK !== $Not_found) {
            throw $runtime["caml_wrap_thrown_exception_reraise"]($sK) as \Throwable;
          }
          $j = $l;
        }
        $word = $caml_call3($String[4], $s, $i, (int) ($j - $i));
        return $l <= $j
          ? Vector{0, $word, 0}
          : (Vector{0, $word, $aux->contents((int) ($j + 1))});
      };
      $a = $aux->contents(0);
      if ($a) {
        if (! $caml_string_notequal($a[1], $cst__1)) {
          $sI = $a[2];
          if (! $sI) {return 0;}
          if (! $caml_string_notequal($sI[1], $cst__2)) {if (! $sI[2]) {return $p3;}}
        }
      }
      return $a;
    };
    $encode_arguments = function($l) use ($List,$Pervasives,$String,$caml_call2,$cst__3,$cst__4,$urlencode) {
      $sD = function($param) use ($Pervasives,$caml_call2,$cst__3,$urlencode) {
        $v = $param[2];
        $n = $param[1];
        $sF = $urlencode(0, $v);
        $sG = $caml_call2($Pervasives[16], $cst__3, $sF);
        $sH = $urlencode(0, $n);
        return $caml_call2($Pervasives[16], $sH, $sG);
      };
      $sE = $caml_call2($List[17], $sD, $l);
      return $caml_call2($String[7], $cst__4, $sE);
    };
    $decode_arguments_js_string = function($s) use ($Js_of_ocaml_Js,$Local_exn,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$caml_wrap_exception,$interrupt,$runtime,$split,$split_2,$urldecode_js_string_string) {
      $aux = new Ref();
      $arr = $split(38, $s);
      $su = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 520590566, 274), $x);
      };
      $len = (function($t18, $param) {return $t18->length;})($arr, $su);
      $name_value_split = function($s) use ($split_2) {
        return $split_2(61, $s);
      };
      $aux->contents = function($acc, $idx) use ($Js_of_ocaml_Js,$Local_exn,$arr,$aux,$caml_call2,$caml_call3,$caml_wrap_exception,$interrupt,$name_value_split,$runtime,$urldecode_js_string_string) {
        $idx__0 = $idx;
        for (;;) {
          if (0 <= $idx__0) {
            try {
              $sv = (int) ($idx__0 + -1);
              $sw = function($s) use ($Js_of_ocaml_Js,$caml_call3,$interrupt,$name_value_split,$urldecode_js_string_string) {
                $sA = function($param) use ($urldecode_js_string_string) {
                  $y = $param[2];
                  $x = $param[1];
                  $sC = $urldecode_js_string_string($y);
                  return Vector{0, $urldecode_js_string_string($x), $sC};
                };
                $sB = $name_value_split($s);
                return $caml_call3($Js_of_ocaml_Js[6][7], $sB, $interrupt, $sA
                );
              };
              $sx = $caml_call2($Js_of_ocaml_Js[16], $arr, $idx__0);
              $sy = $aux->contents(
                Vector{
                  0,
                  $caml_call3($Js_of_ocaml_Js[6][7], $sx, $interrupt, $sw),
                  $acc
                },
                $sv
              );
              return $sy;
            }
            catch(\Throwable $sz) {
              $sz = $caml_wrap_exception($sz);
              if ($sz === $Local_exn) {
                $idx__1 = (int) ($idx__0 + -1);
                $idx__0 = $idx__1;
                continue;
              }
              throw $runtime["caml_wrap_thrown_exception_reraise"]($sz) as \Throwable;
            }
          }
          return $acc;
        }
      };
      return $aux->contents(0, (int) ($len + -1));
    };
    $decode_arguments = function($s) use ($caml_jsbytes_of_string,$decode_arguments_js_string) {
      return $decode_arguments_js_string($caml_jsbytes_of_string($s));
    };
    $p4 = 0;
    $p5 = $caml_jsbytes_of_string(
      $cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
    );
    $p6 = $Js_of_ocaml_Js[10];
    $url_re = (function($t20, $t19, $param) {return new $t20($t19);})($p6, $p5, $p4);
    $p7 = 0;
    $p8 = $caml_jsbytes_of_string($cst_Ff_Ii_Ll_Ee);
    $p9 = $Js_of_ocaml_Js[10];
    $file_re = (function($t22, $t21, $param) {return new $t22($t21);})($p9, $p8, $p7);
    $url_of_js_string = function($s) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$caml_int_of_string,$caml_js_to_byte_string,$caml_jsbytes_of_string,$caml_string_notequal,$cst__10,$cst__11,$cst__5,$cst__6,$cst__7,$cst__8,$cst__9,$decode_arguments_js_string,$file_re,$interrupt,$is_secure,$path_of_path_string,$url_re,$urldecode_js_string_string) {
      $r1 = function($handle) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_int_of_string,$caml_js_to_byte_string,$caml_jsbytes_of_string,$caml_string_notequal,$cst__5,$cst__6,$cst__7,$cst__8,$cst__9,$decode_arguments_js_string,$interrupt,$is_secure,$path_of_path_string,$urldecode_js_string_string) {
        $res = $caml_call1($Js_of_ocaml_Js[21], $handle);
        $sf = $caml_call2($Js_of_ocaml_Js[16], $res, 1);
        $ssl = $is_secure($caml_call2($Js_of_ocaml_Js[6][8], $sf, $interrupt));
        $port_of_string = function($s) use ($caml_int_of_string,$caml_string_notequal,$cst__5,$ssl) {
          return $caml_string_notequal($s, $cst__5)
            ? $caml_int_of_string($s)
            : ($ssl ? 443 : (80));
        };
        $sg = function($param) use ($caml_jsbytes_of_string,$cst__6) {
          return $caml_jsbytes_of_string($cst__6);
        };
        $sh = $caml_call2($Js_of_ocaml_Js[16], $res, 6);
        $path_str = $urldecode_js_string_string(
          $caml_call2($Js_of_ocaml_Js[6][8], $sh, $sg)
        );
        $si = function($param) use ($caml_jsbytes_of_string,$cst__7) {
          return $caml_jsbytes_of_string($cst__7);
        };
        $sj = $caml_call2($Js_of_ocaml_Js[16], $res, 10);
        $sk = $urldecode_js_string_string(
          $caml_call2($Js_of_ocaml_Js[6][8], $sj, $si)
        );
        $sl = function($param) use ($caml_jsbytes_of_string,$cst__8) {
          return $caml_jsbytes_of_string($cst__8);
        };
        $sm = $caml_call2($Js_of_ocaml_Js[16], $res, 8);
        $sn = $decode_arguments_js_string(
          $caml_call2($Js_of_ocaml_Js[6][8], $sm, $sl)
        );
        $so = $path_of_path_string($path_str);
        $sp = function($param) use ($caml_jsbytes_of_string,$cst__9) {
          return $caml_jsbytes_of_string($cst__9);
        };
        $sq = $caml_call2($Js_of_ocaml_Js[16], $res, 4);
        $sr = $port_of_string(
          $caml_js_to_byte_string($caml_call2($Js_of_ocaml_Js[6][8], $sq, $sp)
          )
        );
        $ss = $caml_call2($Js_of_ocaml_Js[16], $res, 2);
        $url = Vector{
          0,
          $urldecode_js_string_string(
            $caml_call2($Js_of_ocaml_Js[6][8], $ss, $interrupt)
          ),
          $sr,
          $so,
          $path_str,
          $sn,
          $sk
        };
        $st = $ssl ? Vector{1, $url} : (Vector{0, $url});
        return Vector{0, $st};
      };
      $r2 = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$cst__10,$cst__11,$decode_arguments_js_string,$file_re,$interrupt,$path_of_path_string,$s,$urldecode_js_string_string) {
        $r5 = function($handle) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_js_to_byte_string,$caml_jsbytes_of_string,$cst__10,$cst__11,$decode_arguments_js_string,$interrupt,$path_of_path_string,$urldecode_js_string_string) {
          $res = $caml_call1($Js_of_ocaml_Js[21], $handle);
          $r9 = $caml_call2($Js_of_ocaml_Js[16], $res, 2);
          $path_str = $urldecode_js_string_string(
            $caml_call2($Js_of_ocaml_Js[6][8], $r9, $interrupt)
          );
          $r_ = function($param) use ($caml_jsbytes_of_string,$cst__10) {
            return $caml_jsbytes_of_string($cst__10);
          };
          $sa = $caml_call2($Js_of_ocaml_Js[16], $res, 6);
          $sb = $caml_js_to_byte_string(
            $caml_call2($Js_of_ocaml_Js[6][8], $sa, $r_)
          );
          $sc = function($param) use ($caml_jsbytes_of_string,$cst__11) {
            return $caml_jsbytes_of_string($cst__11);
          };
          $sd = $caml_call2($Js_of_ocaml_Js[16], $res, 4);
          $se = $decode_arguments_js_string(
            $caml_call2($Js_of_ocaml_Js[6][8], $sd, $sc)
          );
          return Vector{
            0,
            Vector{
              2,
              Vector{0, $path_of_path_string($path_str), $path_str, $se, $sb}
            }
          };
        };
        $r6 = function($param) {return 0;};
        $r7 = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -1021447279, 275), $x
          );
        };
        $r8 = (function($t26, $t25, $param) {return $t26->exec($t25);})($file_re, $s, $r7);
        return $caml_call3($Js_of_ocaml_Js[5][7], $r8, $r6, $r5);
      };
      $r3 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1021447279, 276), $x);
      };
      $r4 = (function($t24, $t23, $param) {return $t24->exec($t23);})($url_re, $s, $r3);
      return $caml_call3($Js_of_ocaml_Js[5][7], $r4, $r2, $r1);
    };
    $url_of_string = function($s) use ($caml_jsbytes_of_string,$url_of_js_string) {
      return $url_of_js_string($caml_jsbytes_of_string($s));
    };
    $string_of_url = function($param) use ($List,$Pervasives,$String,$caml_call1,$caml_call2,$caml_string_notequal,$cst__12,$cst__13,$cst__14,$cst__15,$cst__16,$cst__17,$cst__18,$cst__19,$cst__20,$cst__21,$cst__22,$cst__23,$cst__24,$cst__25,$cst__26,$cst__27,$cst__28,$cst__29,$cst__30,$cst__31,$cst__32,$cst__33,$cst__34,$cst__35,$cst_file__1,$cst_http__1,$cst_https__1,$encode_arguments,$urlencode) {
      switch($param[0]) {
        // FALLTHROUGH
        case 0:
          $match = $param[1];
          $frag = $match[6];
          $args = $match[5];
          $path = $match[3];
          $port = $match[2];
          $host = $match[1];
          if ($caml_string_notequal($frag, $cst__12)) {
            $ro = $urlencode(0, $frag);
            $rp = $caml_call2($Pervasives[16], $cst__13, $ro);
          }
          else {$rp = $cst__20;}
          if ($args) {
            $rq = $encode_arguments($args);
            $rr = $caml_call2($Pervasives[16], $cst__14, $rq);
          }
          else {$rr = $cst__19;}
          $rs = $caml_call2($Pervasives[16], $rr, $rp);
          $rt = function($x) use ($urlencode) {return $urlencode(0, $x);};
          $ru = $caml_call2($List[17], $rt, $path);
          $rv = $caml_call2($String[7], $cst__15, $ru);
          $rw = $caml_call2($Pervasives[16], $rv, $rs);
          $rx = $caml_call2($Pervasives[16], $cst__16, $rw);
          if (80 === $port) {$ry = $cst__17;}
          else {
            $rC = $caml_call1($Pervasives[21], $port);
            $ry = $caml_call2($Pervasives[16], $cst__18, $rC);
          }
          $rz = $caml_call2($Pervasives[16], $ry, $rx);
          $rA = $urlencode(0, $host);
          $rB = $caml_call2($Pervasives[16], $rA, $rz);
          return $caml_call2($Pervasives[16], $cst_http__1, $rB);
        // FALLTHROUGH
        case 1:
          $match__0 = $param[1];
          $frag__0 = $match__0[6];
          $args__0 = $match__0[5];
          $path__0 = $match__0[3];
          $port__0 = $match__0[2];
          $host__0 = $match__0[1];
          if ($caml_string_notequal($frag__0, $cst__21)) {
            $rD = $urlencode(0, $frag__0);
            $rE = $caml_call2($Pervasives[16], $cst__22, $rD);
          }
          else {$rE = $cst__29;}
          if ($args__0) {
            $rF = $encode_arguments($args__0);
            $rG = $caml_call2($Pervasives[16], $cst__23, $rF);
          }
          else {$rG = $cst__28;}
          $rH = $caml_call2($Pervasives[16], $rG, $rE);
          $rI = function($x) use ($urlencode) {return $urlencode(0, $x);};
          $rJ = $caml_call2($List[17], $rI, $path__0);
          $rK = $caml_call2($String[7], $cst__24, $rJ);
          $rL = $caml_call2($Pervasives[16], $rK, $rH);
          $rM = $caml_call2($Pervasives[16], $cst__25, $rL);
          if (443 === $port__0) {$rN = $cst__26;}
          else {
            $rR = $caml_call1($Pervasives[21], $port__0);
            $rN = $caml_call2($Pervasives[16], $cst__27, $rR);
          }
          $rO = $caml_call2($Pervasives[16], $rN, $rM);
          $rP = $urlencode(0, $host__0);
          $rQ = $caml_call2($Pervasives[16], $rP, $rO);
          return $caml_call2($Pervasives[16], $cst_https__1, $rQ);
        // FALLTHROUGH
        default:
          $match__1 = $param[1];
          $frag__1 = $match__1[4];
          $args__1 = $match__1[3];
          $path__1 = $match__1[1];
          if ($caml_string_notequal($frag__1, $cst__30)) {
            $rS = $urlencode(0, $frag__1);
            $rT = $caml_call2($Pervasives[16], $cst__31, $rS);
          }
          else {$rT = $cst__35;}
          if ($args__1) {
            $rU = $encode_arguments($args__1);
            $rV = $caml_call2($Pervasives[16], $cst__32, $rU);
          }
          else {$rV = $cst__34;}
          $rW = $caml_call2($Pervasives[16], $rV, $rT);
          $rX = function($x) use ($urlencode) {return $urlencode(0, $x);};
          $rY = $caml_call2($List[17], $rX, $path__1);
          $rZ = $caml_call2($String[7], $cst__33, $rY);
          $r0 = $caml_call2($Pervasives[16], $rZ, $rW);
          return $caml_call2($Pervasives[16], $cst_file__1, $r0);
        }
    };
    $p_ = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -448369099, 277), $x);
    };
    $qa = $Js_of_ocaml_Dom_html[8];
    $qb = (function($t42, $param) {return $t42->location;})($qa, $p_);
    $qc = $caml_call1($Js_of_ocaml_Js[6][2], $qb);
    
    if ($caml_call1($Js_of_ocaml_Js[6][5], $qc)) {
      $qd = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -448369099, 278), $x);
      };
      $qe = $Js_of_ocaml_Dom_html[8];
      $l = (function($t41, $param) {return $t41->location;})($qe, $qd);
    }
    else {
      $empty = "";
      $qv = Vector{0, 0, 0, 0};
      $qw = function
      ($self, $href, $protocol, $host, $hostname, $port, $pathname, $search, $hash, $origin, $reload, $replace, $assign) use ($CamlinternalOO,$caml_call1,$caml_call2,$cst__37,$pY,$qv,$shared) {
        if (! $qv[1]) {
          $qV = $caml_call1($CamlinternalOO[16], $shared);
          $qW = $caml_call2($CamlinternalOO[3], $qV, $cst__37);
          $qX = $caml_call2($CamlinternalOO[8], $qV, $pY);
          $qY = $qX[1];
          $qZ = $qX[2];
          $q0 = $qX[3];
          $q1 = $qX[4];
          $q2 = $qX[5];
          $q3 = $qX[6];
          $q4 = $qX[7];
          $q5 = $qX[8];
          $q6 = $qX[9];
          $q7 = $qX[10];
          $q8 = $qX[11];
          $q9 = $qX[12];
          $q_ = function($self_1) use ($caml_call1,$qW) {
            $env = $self_1[$qW + 1];
            return $caml_call1($env[2], $env[1]);
          };
          $ra = function($self_1) use ($caml_call1,$qW) {
            $env = $self_1[$qW + 1];
            return $caml_call1($env[3], $env[1]);
          };
          $rb = function($self_1) use ($caml_call1,$qW) {
            $env = $self_1[$qW + 1];
            return $caml_call1($env[4], $env[1]);
          };
          $rc = function($self_1) use ($qW) {
            $env = $self_1[$qW + 1];
            return $env[5];
          };
          $rd = function($self_1) use ($qW) {
            $env = $self_1[$qW + 1];
            return $env[6];
          };
          $re = function($self_1) use ($qW) {
            $env = $self_1[$qW + 1];
            return $env[7];
          };
          $rf = function($self_1) use ($qW) {
            $env = $self_1[$qW + 1];
            return $env[8];
          };
          $rg = function($self_1) use ($qW) {
            $env = $self_1[$qW + 1];
            return $env[9];
          };
          $rh = function($self_1) use ($qW) {
            $env = $self_1[$qW + 1];
            return $env[10];
          };
          $ri = function($self_1) use ($qW) {
            $env = $self_1[$qW + 1];
            return $env[11];
          };
          $rj = function($self_1) use ($qW) {
            $env = $self_1[$qW + 1];
            return $env[12];
          };
          $rk = Vector{
            0,
            $q5,
            function($self_1) use ($qW) {
              $env = $self_1[$qW + 1];
              return $env[13];
            },
            $q1,
            $rj,
            $q7,
            $ri,
            $q6,
            $rh,
            $q2,
            $rg,
            $q3,
            $rf,
            $qY,
            $re,
            $q8,
            $rd,
            $q4,
            $rc,
            $q0,
            $rb,
            $qZ,
            $ra,
            $q9,
            $q_
          };
          $caml_call2($CamlinternalOO[11], $qV, $rk);
          $rl = function($rm) use ($CamlinternalOO,$caml_call2,$qV,$qW) {
            $rn = $caml_call2($CamlinternalOO[24], 0, $qV);
            $rn[$qW + 1] = $rm;
            return $rn;
          };
          $caml_call1($CamlinternalOO[17], $qV);
          $qv[1] = $rl;
        }
        return $caml_call1(
          $qv[1],
          Vector{
            0,
            $self,
            $assign,
            $replace,
            $reload,
            $origin,
            $hash,
            $search,
            $pathname,
            $port,
            $hostname,
            $host,
            $protocol,
            $href
          }
        );
      };
      $qx = function($param, $qU) {return 0;};
      $qy = function($param, $qT) {return 0;};
      $qz = function($param) {return 0;};
      $qA = $Js_of_ocaml_Js[3];
      $l = (function
       ($t29, $t30, $t31, $t32, $t33, $t34, $t35, $t36, $t37, $t38, $t39, $t40, $param) use ($caml_js_wrap_meth_callback) {
         return (object)darray[
          "href"=>$t29,
          "protocol"=>$t30,
          "host"=>$t31,
          "hostname"=>$t32,
          "port"=>$t33,
          "pathname"=>$t34,
          "search"=>$t35,
          "hash"=>$t36,
          "origin"=>$t37,
          "reload"=>$caml_js_wrap_meth_callback($t38),
          "replace"=>$caml_js_wrap_meth_callback($t39),
          "assign"=>$caml_js_wrap_meth_callback($t40)];
       })(
        $empty,
        $empty,
        $empty,
        $empty,
        $empty,
        $empty,
        $empty,
        $empty,
        $qA,
        $qz,
        $qy,
        $qx,
        $qw
      );
    }
    
    $qf = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -757983821, 279), $x);
    };
    $host = $urldecode_js_string_string(
      (function($t43, $param) {return $t43->hostname;})($l, $qf)
    );
    $qg = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 6510168, 280), $x);
    };
    $protocol = $urldecode_js_string_string(
      (function($t44, $param) {return $t44->protocol;})($l, $qg)
    );
    $qh = 0;
    $port = (function($param) use ($Failure,$caml_call1,$caml_get_public_method,$caml_int_of_string,$caml_js_to_byte_string,$caml_wrap_exception,$l,$runtime) {
       try {
         $qQ = function($x) use ($caml_call1,$caml_get_public_method) {
           return $caml_call1($caml_get_public_method($x, -899906687, 281), $x
           );
         };
         $qR = Vector{
           0,
           $caml_int_of_string(
             $caml_js_to_byte_string(
               (function($t45, $param) {return $t45->port;})($l, $qQ)
             )
           )
         };
         return $qR;
       }
       catch(\Throwable $qS) {
         $qS = $caml_wrap_exception($qS);
         if ($qS[1] === $Failure) {return 0;}
         throw $runtime["caml_wrap_thrown_exception_reraise"]($qS) as \Throwable;
       }
     })($qh);
    $qi = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -742027664, 282), $x);
    };
    $path_string = $urldecode_js_string_string(
      (function($t46, $param) {return $t46->pathname;})($l, $qi)
    );
    $path = $path_of_path_string($path_string);
    $qj = "?";
    $qk = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 930445673, 283), $x);
    };
    $ql = 0;
    $qm = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -487088280, 284), $x);
    };
    $qn = (function($t51, $param) {return $t51->search;})($l, $qm);
    
    if (
      (function($t53, $t52, $param) {return $t53->charAt($t52);})($qn, $ql, $qk) === $qj
    ) {
      $qo = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -303194578, 285), $x);
      };
      $qp = 1;
      $qq = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -487088280, 286), $x);
      };
      $qr = (function($t48, $param) {return $t48->search;})($l, $qq);
      $qs = (function($t50, $t49, $param) {return $t50->slice($t49);})($qr, $qp, $qo);
    }
    else {
      $qu = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -487088280, 293), $x);
      };
      $qs = (function($t47, $param) {return $t47->search;})($l, $qu);
    }
    
    $arguments__0 = $decode_arguments_js_string($qs);
    $get_fragment = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_call3,$caml_get_public_method,$cst__36,$l,$runtime) {
      $qG = function($res) use ($Js_of_ocaml_Js,$caml_call1,$runtime) {
        $res__0 = $caml_call1($Js_of_ocaml_Js[21], $res);
        return $runtime["caml_js_to_string"]($res__0[1]);
      };
      $qH = function($param) use ($cst__36) {return $cst__36;};
      $qI = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -16084858, 287), $x);
      };
      $qJ = 0;
      $qK = "#(.*)";
      $qL = $Js_of_ocaml_Js[10];
      $qM = (function($t56, $t55, $param) {return new $t56($t55);})($qL, $qK, $qJ);
      $qN = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -988476949, 288), $x);
      };
      $qO = (function($t54, $param) {return $t54->href;})($l, $qN);
      $qP = (function($t58, $t57, $param) {return $t58->match($t57);})($qO, $qM, $qI);
      return $caml_call3($Js_of_ocaml_Js[5][7], $qP, $qH, $qG);
    };
    $set_fragment = function($s) use ($caml_call1,$caml_get_public_method,$caml_jsbytes_of_string,$l,$urlencode) {
      $qE = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -989319218, 289), $x);
      };
      $qF = $caml_jsbytes_of_string($urlencode(0, $s));
      return (function($t60, $t59, $param) {return $t60->hash = $t59;})($l, $qF, $qE);
    };
    $get = function($param) use ($caml_call1,$caml_get_public_method,$l,$url_of_js_string) {
      $qD = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -988476949, 290), $x);
      };
      return $url_of_js_string(
        (function($t61, $param) {return $t61->href;})($l, $qD)
      );
    };
    $set = function($u) use ($caml_call1,$caml_get_public_method,$caml_jsbytes_of_string,$l,$string_of_url) {
      $qB = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -988476949, 291), $x);
      };
      $qC = $caml_jsbytes_of_string($string_of_url($u));
      return (function($t63, $t62, $param) {return $t63->href = $t62;})($l, $qC, $qB);
    };
    $qt = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -988476949, 292), $x);
    };
    $as_string = $urldecode_js_string_string(
      (function($t64, $param) {return $t64->href;})($l, $qt)
    );
    $Js_of_ocaml_Url = Vector{
      0,
      $urldecode,
      $urlencode,
      $default_http_port,
      $default_https_port,
      $path_of_path_string,
      $encode_arguments,
      $decode_arguments,
      $url_of_string,
      $string_of_url,
      Vector{
        0,
        $host,
        $port,
        $protocol,
        $path_string,
        $path,
        $arguments__0,
        $get_fragment,
        $set_fragment,
        $get,
        $set,
        $as_string
      }
    };
    
    $runtime["caml_register_global"](
      110,
      $Js_of_ocaml_Url,
      "Js_of_ocaml__Url"
    );

  }
}