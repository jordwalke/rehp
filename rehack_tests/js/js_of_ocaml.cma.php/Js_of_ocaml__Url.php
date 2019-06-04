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
    $p4 = Vector{0, $caml_new_string(""), 0};
    $pZ = Vector{
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
      $s1 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 24046298, 267), $x);
      };
      $s2 = $caml_call2($String[1], 1, $c)->toString();
      $s3 = (function($t1, $t0, $param) {return $t1->split($t0);})($s, $s2, $s1);
      return $caml_call1($Js_of_ocaml_Js[20], $s3);
    };
    $split_2 = function($c, $s) use ($Js_of_ocaml_Js,$String,$caml_call1,$caml_call2,$caml_get_public_method) {
      $sT = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -524334903, 268), $x);
      };
      $sU = $caml_call2($String[1], 1, $c)->toString();
      $index = (function($t8, $t7, $param) {return $t8->indexOf($t7);})($s, $sU, $sT);
      if (0 <= $index) {
        $sV = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -303194578, 269), $x);
        };
        $sW = (int) ($index + 1);
        $sX = (function($t6, $t5, $param) {return $t6->slice($t5);})($s, $sW, $sV);
        $sY = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -20462510, 270), $x);
        };
        $sZ = 0;
        $s0 = Vector{
          0,
          (function($t4, $t2, $t3, $param) {return $t4->slice($t2, $t3);})($s, $sZ, $index, $sY),
          $sX
        };
        return $caml_call1($Js_of_ocaml_Js[4], $s0);
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
    $p0 = 0;
    $p1 = "g";
    $p2 = "\\+";
    $p3 = $Js_of_ocaml_Js[11];
    $plus_re_js_string = (function($t11, $t9, $t10, $param) {return new $t11($t9, $t10);
     })($p3, $p2, $p1, $p0);
    $unescape_plus_js_string = function($s) use ($caml_call1,$caml_get_public_method,$plus_re_js_string) {
      $sP = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 180472028, 271), $x);
      };
      $sQ = 0;
      ((function($t16, $t15, $param) {$t16->lastIndex = $t15;return 0;})($plus_re_js_string, $sQ, $sP));
      $sR = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 724060212, 272), $x);
      };
      $sS = " ";
      return (function($t14, $t12, $t13, $param) {
         return $t14->replace($t12, $t13);
       })($s, $plus_re_js_string, $sS, $sR);
    };
    $urldecode_js_string_string = function($s) use ($Js_of_ocaml_Js,$caml_call1,$caml_js_to_byte_string,$unescape_plus_js_string) {
      $sO = $unescape_plus_js_string($s);
      return $caml_js_to_byte_string($caml_call1($Js_of_ocaml_Js[42], $sO));
    };
    $urldecode = function($s) use ($Js_of_ocaml_Js,$caml_call1,$caml_js_to_byte_string,$caml_jsbytes_of_string,$unescape_plus) {
      $sN = $caml_jsbytes_of_string($unescape_plus($s));
      return $caml_js_to_byte_string($caml_call1($Js_of_ocaml_Js[42], $sN));
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
      $sM = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 946097238, 273), $x);
      };
      $match = $caml_js_to_byte_string(
        (function($t17, $param) {return $t17->toLowerCase();})($prot_string, $sM)
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
    $path_of_path_string = function($s) use ($Not_found,$String,$caml_call3,$caml_string_notequal,$caml_wrap_exception,$cst__1,$cst__2,$p4,$runtime) {
      $aux = new Ref();
      $l = $runtime["caml_ml_string_length"]($s);
      $aux->contents = function($i) use ($Not_found,$String,$aux,$caml_call3,$caml_wrap_exception,$l,$runtime,$s) {
        try {$sK = $caml_call3($String[18], $s, $i, 47);$j = $sK;}
        catch(\Throwable $sL) {
          $sL = $caml_wrap_exception($sL);
          if ($sL !== $Not_found) {
            throw $runtime["caml_wrap_thrown_exception_reraise"]($sL) as \Throwable;
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
          $sJ = $a[2];
          if (! $sJ) {return 0;}
          if (! $caml_string_notequal($sJ[1], $cst__2)) {if (! $sJ[2]) {return $p4;}}
        }
      }
      return $a;
    };
    $encode_arguments = function($l) use ($List,$Pervasives,$String,$caml_call2,$cst__3,$cst__4,$urlencode) {
      $sE = function($param) use ($Pervasives,$caml_call2,$cst__3,$urlencode) {
        $v = $param[2];
        $n = $param[1];
        $sG = $urlencode(0, $v);
        $sH = $caml_call2($Pervasives[16], $cst__3, $sG);
        $sI = $urlencode(0, $n);
        return $caml_call2($Pervasives[16], $sI, $sH);
      };
      $sF = $caml_call2($List[17], $sE, $l);
      return $caml_call2($String[7], $cst__4, $sF);
    };
    $decode_arguments_js_string = function($s) use ($Js_of_ocaml_Js,$Local_exn,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$caml_wrap_exception,$interrupt,$runtime,$split,$split_2,$urldecode_js_string_string) {
      $aux = new Ref();
      $arr = $split(38, $s);
      $sv = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 520590566, 274), $x);
      };
      $len = (function($t18, $param) {return $t18->length;})($arr, $sv);
      $name_value_split = function($s) use ($split_2) {
        return $split_2(61, $s);
      };
      $aux->contents = function($acc, $idx) use ($Js_of_ocaml_Js,$Local_exn,$arr,$aux,$caml_call2,$caml_call3,$caml_wrap_exception,$interrupt,$name_value_split,$runtime,$urldecode_js_string_string) {
        $idx__0 = $idx;
        for (;;) {
          if (0 <= $idx__0) {
            try {
              $sw = (int) ($idx__0 + -1);
              $sx = function($s) use ($Js_of_ocaml_Js,$caml_call3,$interrupt,$name_value_split,$urldecode_js_string_string) {
                $sB = function($param) use ($urldecode_js_string_string) {
                  $y = $param[2];
                  $x = $param[1];
                  $sD = $urldecode_js_string_string($y);
                  return Vector{0, $urldecode_js_string_string($x), $sD};
                };
                $sC = $name_value_split($s);
                return $caml_call3($Js_of_ocaml_Js[6][7], $sC, $interrupt, $sB
                );
              };
              $sy = $caml_call2($Js_of_ocaml_Js[16], $arr, $idx__0);
              $sz = $aux->contents(
                Vector{
                  0,
                  $caml_call3($Js_of_ocaml_Js[6][7], $sy, $interrupt, $sx),
                  $acc
                },
                $sw
              );
              return $sz;
            }
            catch(\Throwable $sA) {
              $sA = $caml_wrap_exception($sA);
              if ($sA === $Local_exn) {
                $idx__1 = (int) ($idx__0 + -1);
                $idx__0 = $idx__1;
                continue;
              }
              throw $runtime["caml_wrap_thrown_exception_reraise"]($sA) as \Throwable;
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
    $p5 = 0;
    $p6 = $caml_jsbytes_of_string(
      $cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
    );
    $p7 = $Js_of_ocaml_Js[10];
    $url_re = (function($t20, $t19, $param) {return new $t20($t19);})($p7, $p6, $p5);
    $p8 = 0;
    $p9 = $caml_jsbytes_of_string($cst_Ff_Ii_Ll_Ee);
    $p_ = $Js_of_ocaml_Js[10];
    $file_re = (function($t22, $t21, $param) {return new $t22($t21);})($p_, $p9, $p8);
    $url_of_js_string = function($s) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$caml_int_of_string,$caml_js_to_byte_string,$caml_jsbytes_of_string,$caml_string_notequal,$cst__10,$cst__11,$cst__5,$cst__6,$cst__7,$cst__8,$cst__9,$decode_arguments_js_string,$file_re,$interrupt,$is_secure,$path_of_path_string,$url_re,$urldecode_js_string_string) {
      $r2 = function($handle) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_int_of_string,$caml_js_to_byte_string,$caml_jsbytes_of_string,$caml_string_notequal,$cst__5,$cst__6,$cst__7,$cst__8,$cst__9,$decode_arguments_js_string,$interrupt,$is_secure,$path_of_path_string,$urldecode_js_string_string) {
        $res = $caml_call1($Js_of_ocaml_Js[21], $handle);
        $sg = $caml_call2($Js_of_ocaml_Js[16], $res, 1);
        $ssl = $is_secure($caml_call2($Js_of_ocaml_Js[6][8], $sg, $interrupt));
        $port_of_string = function($s) use ($caml_int_of_string,$caml_string_notequal,$cst__5,$ssl) {
          return $caml_string_notequal($s, $cst__5)
            ? $caml_int_of_string($s)
            : ($ssl ? 443 : (80));
        };
        $sh = function($param) use ($caml_jsbytes_of_string,$cst__6) {
          return $caml_jsbytes_of_string($cst__6);
        };
        $si = $caml_call2($Js_of_ocaml_Js[16], $res, 6);
        $path_str = $urldecode_js_string_string(
          $caml_call2($Js_of_ocaml_Js[6][8], $si, $sh)
        );
        $sj = function($param) use ($caml_jsbytes_of_string,$cst__7) {
          return $caml_jsbytes_of_string($cst__7);
        };
        $sk = $caml_call2($Js_of_ocaml_Js[16], $res, 10);
        $sl = $urldecode_js_string_string(
          $caml_call2($Js_of_ocaml_Js[6][8], $sk, $sj)
        );
        $sm = function($param) use ($caml_jsbytes_of_string,$cst__8) {
          return $caml_jsbytes_of_string($cst__8);
        };
        $sn = $caml_call2($Js_of_ocaml_Js[16], $res, 8);
        $so = $decode_arguments_js_string(
          $caml_call2($Js_of_ocaml_Js[6][8], $sn, $sm)
        );
        $sp = $path_of_path_string($path_str);
        $sq = function($param) use ($caml_jsbytes_of_string,$cst__9) {
          return $caml_jsbytes_of_string($cst__9);
        };
        $sr = $caml_call2($Js_of_ocaml_Js[16], $res, 4);
        $ss = $port_of_string(
          $caml_js_to_byte_string($caml_call2($Js_of_ocaml_Js[6][8], $sr, $sq)
          )
        );
        $st = $caml_call2($Js_of_ocaml_Js[16], $res, 2);
        $url = Vector{
          0,
          $urldecode_js_string_string(
            $caml_call2($Js_of_ocaml_Js[6][8], $st, $interrupt)
          ),
          $ss,
          $sp,
          $path_str,
          $so,
          $sl
        };
        $su = $ssl ? Vector{1, $url} : (Vector{0, $url});
        return Vector{0, $su};
      };
      $r3 = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$cst__10,$cst__11,$decode_arguments_js_string,$file_re,$interrupt,$path_of_path_string,$s,$urldecode_js_string_string) {
        $r6 = function($handle) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_js_to_byte_string,$caml_jsbytes_of_string,$cst__10,$cst__11,$decode_arguments_js_string,$interrupt,$path_of_path_string,$urldecode_js_string_string) {
          $res = $caml_call1($Js_of_ocaml_Js[21], $handle);
          $r_ = $caml_call2($Js_of_ocaml_Js[16], $res, 2);
          $path_str = $urldecode_js_string_string(
            $caml_call2($Js_of_ocaml_Js[6][8], $r_, $interrupt)
          );
          $sa = function($param) use ($caml_jsbytes_of_string,$cst__10) {
            return $caml_jsbytes_of_string($cst__10);
          };
          $sb = $caml_call2($Js_of_ocaml_Js[16], $res, 6);
          $sc = $caml_js_to_byte_string(
            $caml_call2($Js_of_ocaml_Js[6][8], $sb, $sa)
          );
          $sd = function($param) use ($caml_jsbytes_of_string,$cst__11) {
            return $caml_jsbytes_of_string($cst__11);
          };
          $se = $caml_call2($Js_of_ocaml_Js[16], $res, 4);
          $sf = $decode_arguments_js_string(
            $caml_call2($Js_of_ocaml_Js[6][8], $se, $sd)
          );
          return Vector{
            0,
            Vector{
              2,
              Vector{0, $path_of_path_string($path_str), $path_str, $sf, $sc}
            }
          };
        };
        $r7 = function($param) {return 0;};
        $r8 = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -1021447279, 275), $x
          );
        };
        $r9 = (function($t26, $t25, $param) {return $t26->exec($t25);})($file_re, $s, $r8);
        return $caml_call3($Js_of_ocaml_Js[5][7], $r9, $r7, $r6);
      };
      $r4 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1021447279, 276), $x);
      };
      $r5 = (function($t24, $t23, $param) {return $t24->exec($t23);})($url_re, $s, $r4);
      return $caml_call3($Js_of_ocaml_Js[5][7], $r5, $r3, $r2);
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
            $rp = $urlencode(0, $frag);
            $rq = $caml_call2($Pervasives[16], $cst__13, $rp);
          }
          else {$rq = $cst__20;}
          if ($args) {
            $rr = $encode_arguments($args);
            $rs = $caml_call2($Pervasives[16], $cst__14, $rr);
          }
          else {$rs = $cst__19;}
          $rt = $caml_call2($Pervasives[16], $rs, $rq);
          $ru = function($x) use ($urlencode) {return $urlencode(0, $x);};
          $rv = $caml_call2($List[17], $ru, $path);
          $rw = $caml_call2($String[7], $cst__15, $rv);
          $rx = $caml_call2($Pervasives[16], $rw, $rt);
          $ry = $caml_call2($Pervasives[16], $cst__16, $rx);
          if (80 === $port) {$rz = $cst__17;}
          else {
            $rD = $caml_call1($Pervasives[21], $port);
            $rz = $caml_call2($Pervasives[16], $cst__18, $rD);
          }
          $rA = $caml_call2($Pervasives[16], $rz, $ry);
          $rB = $urlencode(0, $host);
          $rC = $caml_call2($Pervasives[16], $rB, $rA);
          return $caml_call2($Pervasives[16], $cst_http__1, $rC);
        // FALLTHROUGH
        case 1:
          $match__0 = $param[1];
          $frag__0 = $match__0[6];
          $args__0 = $match__0[5];
          $path__0 = $match__0[3];
          $port__0 = $match__0[2];
          $host__0 = $match__0[1];
          if ($caml_string_notequal($frag__0, $cst__21)) {
            $rE = $urlencode(0, $frag__0);
            $rF = $caml_call2($Pervasives[16], $cst__22, $rE);
          }
          else {$rF = $cst__29;}
          if ($args__0) {
            $rG = $encode_arguments($args__0);
            $rH = $caml_call2($Pervasives[16], $cst__23, $rG);
          }
          else {$rH = $cst__28;}
          $rI = $caml_call2($Pervasives[16], $rH, $rF);
          $rJ = function($x) use ($urlencode) {return $urlencode(0, $x);};
          $rK = $caml_call2($List[17], $rJ, $path__0);
          $rL = $caml_call2($String[7], $cst__24, $rK);
          $rM = $caml_call2($Pervasives[16], $rL, $rI);
          $rN = $caml_call2($Pervasives[16], $cst__25, $rM);
          if (443 === $port__0) {$rO = $cst__26;}
          else {
            $rS = $caml_call1($Pervasives[21], $port__0);
            $rO = $caml_call2($Pervasives[16], $cst__27, $rS);
          }
          $rP = $caml_call2($Pervasives[16], $rO, $rN);
          $rQ = $urlencode(0, $host__0);
          $rR = $caml_call2($Pervasives[16], $rQ, $rP);
          return $caml_call2($Pervasives[16], $cst_https__1, $rR);
        // FALLTHROUGH
        default:
          $match__1 = $param[1];
          $frag__1 = $match__1[4];
          $args__1 = $match__1[3];
          $path__1 = $match__1[1];
          if ($caml_string_notequal($frag__1, $cst__30)) {
            $rT = $urlencode(0, $frag__1);
            $rU = $caml_call2($Pervasives[16], $cst__31, $rT);
          }
          else {$rU = $cst__35;}
          if ($args__1) {
            $rV = $encode_arguments($args__1);
            $rW = $caml_call2($Pervasives[16], $cst__32, $rV);
          }
          else {$rW = $cst__34;}
          $rX = $caml_call2($Pervasives[16], $rW, $rU);
          $rY = function($x) use ($urlencode) {return $urlencode(0, $x);};
          $rZ = $caml_call2($List[17], $rY, $path__1);
          $r0 = $caml_call2($String[7], $cst__33, $rZ);
          $r1 = $caml_call2($Pervasives[16], $r0, $rX);
          return $caml_call2($Pervasives[16], $cst_file__1, $r1);
        }
    };
    $qa = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -448369099, 277), $x);
    };
    $qb = $Js_of_ocaml_Dom_html[8];
    $qc = (function($t42, $param) {return $t42->location;})($qb, $qa);
    $qd = $caml_call1($Js_of_ocaml_Js[6][2], $qc);
    
    if ($caml_call1($Js_of_ocaml_Js[6][5], $qd)) {
      $qe = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -448369099, 278), $x);
      };
      $qf = $Js_of_ocaml_Dom_html[8];
      $l = (function($t41, $param) {return $t41->location;})($qf, $qe);
    }
    else {
      $empty = "";
      $qw = Vector{0, 0, 0, 0};
      $qx = function
      ($self, $href, $protocol, $host, $hostname, $port, $pathname, $search, $hash, $origin, $reload, $replace, $assign) use ($CamlinternalOO,$caml_call1,$caml_call2,$cst__37,$pZ,$qw,$shared) {
        if (! $qw[1]) {
          $qW = $caml_call1($CamlinternalOO[16], $shared);
          $qX = $caml_call2($CamlinternalOO[3], $qW, $cst__37);
          $qY = $caml_call2($CamlinternalOO[8], $qW, $pZ);
          $qZ = $qY[1];
          $q0 = $qY[2];
          $q1 = $qY[3];
          $q2 = $qY[4];
          $q3 = $qY[5];
          $q4 = $qY[6];
          $q5 = $qY[7];
          $q6 = $qY[8];
          $q7 = $qY[9];
          $q8 = $qY[10];
          $q9 = $qY[11];
          $q_ = $qY[12];
          $ra = function($self_1) use ($caml_call1,$qX) {
            $env = $self_1[$qX + 1];
            return $caml_call1($env[2], $env[1]);
          };
          $rb = function($self_1) use ($caml_call1,$qX) {
            $env = $self_1[$qX + 1];
            return $caml_call1($env[3], $env[1]);
          };
          $rc = function($self_1) use ($caml_call1,$qX) {
            $env = $self_1[$qX + 1];
            return $caml_call1($env[4], $env[1]);
          };
          $rd = function($self_1) use ($qX) {
            $env = $self_1[$qX + 1];
            return $env[5];
          };
          $re = function($self_1) use ($qX) {
            $env = $self_1[$qX + 1];
            return $env[6];
          };
          $rf = function($self_1) use ($qX) {
            $env = $self_1[$qX + 1];
            return $env[7];
          };
          $rg = function($self_1) use ($qX) {
            $env = $self_1[$qX + 1];
            return $env[8];
          };
          $rh = function($self_1) use ($qX) {
            $env = $self_1[$qX + 1];
            return $env[9];
          };
          $ri = function($self_1) use ($qX) {
            $env = $self_1[$qX + 1];
            return $env[10];
          };
          $rj = function($self_1) use ($qX) {
            $env = $self_1[$qX + 1];
            return $env[11];
          };
          $rk = function($self_1) use ($qX) {
            $env = $self_1[$qX + 1];
            return $env[12];
          };
          $rl = Vector{
            0,
            $q6,
            function($self_1) use ($qX) {
              $env = $self_1[$qX + 1];
              return $env[13];
            },
            $q2,
            $rk,
            $q8,
            $rj,
            $q7,
            $ri,
            $q3,
            $rh,
            $q4,
            $rg,
            $qZ,
            $rf,
            $q9,
            $re,
            $q5,
            $rd,
            $q1,
            $rc,
            $q0,
            $rb,
            $q_,
            $ra
          };
          $caml_call2($CamlinternalOO[11], $qW, $rl);
          $rm = function($rn) use ($CamlinternalOO,$caml_call2,$qW,$qX) {
            $ro = $caml_call2($CamlinternalOO[24], 0, $qW);
            $ro[$qX + 1] = $rn;
            return $ro;
          };
          $caml_call1($CamlinternalOO[17], $qW);
          $qw[1] = $rm;
        }
        return $caml_call1(
          $qw[1],
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
      $qy = function($param, $qV) {return 0;};
      $qz = function($param, $qU) {return 0;};
      $qA = function($param) {return 0;};
      $qB = $Js_of_ocaml_Js[3];
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
        $qB,
        $qA,
        $qz,
        $qy,
        $qx
      );
    }
    
    $qg = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -757983821, 279), $x);
    };
    $host = $urldecode_js_string_string(
      (function($t43, $param) {return $t43->hostname;})($l, $qg)
    );
    $qh = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 6510168, 280), $x);
    };
    $protocol = $urldecode_js_string_string(
      (function($t44, $param) {return $t44->protocol;})($l, $qh)
    );
    $qi = 0;
    $port = (function($param) use ($Failure,$caml_call1,$caml_get_public_method,$caml_int_of_string,$caml_js_to_byte_string,$caml_wrap_exception,$l,$runtime) {
       try {
         $qR = function($x) use ($caml_call1,$caml_get_public_method) {
           return $caml_call1($caml_get_public_method($x, -899906687, 281), $x
           );
         };
         $qS = Vector{
           0,
           $caml_int_of_string(
             $caml_js_to_byte_string(
               (function($t45, $param) {return $t45->port;})($l, $qR)
             )
           )
         };
         return $qS;
       }
       catch(\Throwable $qT) {
         $qT = $caml_wrap_exception($qT);
         if ($qT[1] === $Failure) {return 0;}
         throw $runtime["caml_wrap_thrown_exception_reraise"]($qT) as \Throwable;
       }
     })($qi);
    $qj = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -742027664, 282), $x);
    };
    $path_string = $urldecode_js_string_string(
      (function($t46, $param) {return $t46->pathname;})($l, $qj)
    );
    $path = $path_of_path_string($path_string);
    $qk = "?";
    $ql = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 930445673, 283), $x);
    };
    $qm = 0;
    $qn = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -487088280, 284), $x);
    };
    $qo = (function($t51, $param) {return $t51->search;})($l, $qn);
    
    if (
      (function($t53, $t52, $param) {return $t53->charAt($t52);})($qo, $qm, $ql) === $qk
    ) {
      $qp = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -303194578, 285), $x);
      };
      $qq = 1;
      $qr = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -487088280, 286), $x);
      };
      $qs = (function($t48, $param) {return $t48->search;})($l, $qr);
      $qt = (function($t50, $t49, $param) {return $t50->slice($t49);})($qs, $qq, $qp);
    }
    else {
      $qv = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -487088280, 293), $x);
      };
      $qt = (function($t47, $param) {return $t47->search;})($l, $qv);
    }
    
    $arguments__0 = $decode_arguments_js_string($qt);
    $get_fragment = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_call3,$caml_get_public_method,$cst__36,$l,$runtime) {
      $qH = function($res) use ($Js_of_ocaml_Js,$caml_call1,$runtime) {
        $res__0 = $caml_call1($Js_of_ocaml_Js[21], $res);
        return $runtime["caml_js_to_string"]($res__0[1]);
      };
      $qI = function($param) use ($cst__36) {return $cst__36;};
      $qJ = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -16084858, 287), $x);
      };
      $qK = 0;
      $qL = "#(.*)";
      $qM = $Js_of_ocaml_Js[10];
      $qN = (function($t56, $t55, $param) {return new $t56($t55);})($qM, $qL, $qK);
      $qO = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -988476949, 288), $x);
      };
      $qP = (function($t54, $param) {return $t54->href;})($l, $qO);
      $qQ = (function($t58, $t57, $param) {return $t58->match($t57);})($qP, $qN, $qJ);
      return $caml_call3($Js_of_ocaml_Js[5][7], $qQ, $qI, $qH);
    };
    $set_fragment = function($s) use ($caml_call1,$caml_get_public_method,$caml_jsbytes_of_string,$l,$urlencode) {
      $qF = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -989319218, 289), $x);
      };
      $qG = $caml_jsbytes_of_string($urlencode(0, $s));
      return (function($t60, $t59, $param) {$t60->hash = $t59;return 0;})($l, $qG, $qF);
    };
    $get = function($param) use ($caml_call1,$caml_get_public_method,$l,$url_of_js_string) {
      $qE = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -988476949, 290), $x);
      };
      return $url_of_js_string(
        (function($t61, $param) {return $t61->href;})($l, $qE)
      );
    };
    $set = function($u) use ($caml_call1,$caml_get_public_method,$caml_jsbytes_of_string,$l,$string_of_url) {
      $qC = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -988476949, 291), $x);
      };
      $qD = $caml_jsbytes_of_string($string_of_url($u));
      return (function($t63, $t62, $param) {$t63->href = $t62;return 0;})($l, $qD, $qC);
    };
    $qu = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -988476949, 292), $x);
    };
    $as_string = $urldecode_js_string_string(
      (function($t64, $param) {return $t64->href;})($l, $qu)
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