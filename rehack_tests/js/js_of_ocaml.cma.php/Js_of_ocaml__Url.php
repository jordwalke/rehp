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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_fresh_oo_id = $runtime["caml_fresh_oo_id"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_int_of_string = $runtime["caml_int_of_string"];
    $caml_js_to_byte_string = $runtime["caml_js_to_byte_string"];
    $caml_js_wrap_meth_callback = $runtime["caml_js_wrap_meth_callback"];
    $caml_jsbytes_of_string = $runtime["caml_jsbytes_of_string"];
    $string = $runtime["caml_new_string"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst__36 = $string("");
    $cst__37 = $string("");
    $cst__12 = $string("");
    $cst__20 = $string("");
    $cst__13 = $string("#");
    $cst__14 = $string("?");
    $cst__19 = $string("");
    $cst__15 = $string("/");
    $cst__16 = $string("/");
    $cst__18 = $string(":");
    $cst__17 = $string("");
    $cst_http__1 = $string("http://");
    $cst__21 = $string("");
    $cst__29 = $string("");
    $cst__22 = $string("#");
    $cst__23 = $string("?");
    $cst__28 = $string("");
    $cst__24 = $string("/");
    $cst__25 = $string("/");
    $cst__27 = $string(":");
    $cst__26 = $string("");
    $cst_https__1 = $string("https://");
    $cst__30 = $string("");
    $cst__35 = $string("");
    $cst__31 = $string("#");
    $cst__32 = $string("?");
    $cst__34 = $string("");
    $cst__33 = $string("/");
    $cst_file__1 = $string("file://");
    $cst__11 = $string("");
    $cst__10 = $string("");
    $cst__9 = $string("");
    $cst__8 = $string("");
    $cst__7 = $string("");
    $cst__6 = $string("");
    $cst__5 = $string("");
    $cst__3 = $string("=");
    $cst__4 = $string("&");
    $cst__1 = $string("");
    $cst__2 = $string("");
    $cst_file = $string("file");
    $cst_file__0 = $string("file:");
    $cst_http = $string("http");
    $cst_http__0 = $string("http:");
    $cst_https = $string("https");
    $cst_https__0 = $string("https:");
    $cst__0 = $string(" ");
    $cst_2B = $string("%2B");
    $shared = Vector{
      0,
      $string("hash"),
      $string("host"),
      $string("href"),
      $string("port"),
      $string("origin"),
      $string("assign"),
      $string("hostname"),
      $string("pathname"),
      $string("search"),
      $string("protocol"),
      $string("reload"),
      $string("replace")
    };
    $cst_Js_of_ocaml_Url_Local_exn = $string("Js_of_ocaml__Url.Local_exn");
    $cst = $string("+");
    $cst_Js_of_ocaml_Url_Not_an_http_protocol = $string(
      "Js_of_ocaml__Url.Not_an_http_protocol"
    );
    $cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9 = $string(
      "^([Hh][Tt][Tt][Pp][Ss]?)://([0-9a-zA-Z.-]+|\\[[0-9a-zA-Z.-]+\\]|\\[[0-9A-Fa-f:.]+\\])?(:([0-9]+))?(/([^\\?#]*)(\\?([^#]*))?(#(.*))?)?\\$"
    );
    $cst_Ff_Ii_Ll_Ee = $string(
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
    $f = Vector{0, $string(""), 0};
    $a = Vector{
      0,
      $string("search"),
      $string("replace"),
      $string("reload"),
      $string("protocol"),
      $string("port"),
      $string("pathname"),
      $string("origin"),
      $string("href"),
      $string("hostname"),
      $string("host"),
      $string("hash"),
      $string("assign")
    };
    $split = function(dynamic $c, dynamic $s) use ($Js_of_ocaml_Js,$String,$call1,$call2,$caml_get_public_method) {
      $cn = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 24046298, 234), $x);
      };
      $co = $call2($String[1], 1, $c)->toString();
      $cp = (function(dynamic $t1, dynamic $t0, dynamic $param) {return $t1->split($t0);
       })($s, $co, $cn);
      return $call1($Js_of_ocaml_Js[20], $cp);
    };
    $split_2 = function(dynamic $c, dynamic $s) use ($Js_of_ocaml_Js,$String,$call1,$call2,$caml_get_public_method) {
      $cf = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -524334903, 235), $x);
      };
      $cg = $call2($String[1], 1, $c)->toString();
      $index = (function(dynamic $t8, dynamic $t7, dynamic $param) {return $t8->indexOf($t7);
       })($s, $cg, $cf);
      if (0 <= $index) {
        $ch = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -303194578, 236), $x);
        };
        $ci = (int) ($index + 1);
        $cj = (function(dynamic $t6, dynamic $t5, dynamic $param) {return $t6->slice($t5);
         })($s, $ci, $ch);
        $ck = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -20462510, 237), $x);
        };
        $cl = 0;
        $cm = Vector{
          0,
          (function(dynamic $t4, dynamic $t2, dynamic $t3, dynamic $param) {return $t4->slice($t2, $t3);
           })($s, $cl, $index, $ck),
          $cj
        };
        return $call1($Js_of_ocaml_Js[4], $cm);
      }
      return $Js_of_ocaml_Js[3];
    };
    $Local_exn = Vector{
      248,
      $cst_Js_of_ocaml_Url_Local_exn,
      $caml_fresh_oo_id(0)
    };
    $interrupt = function(dynamic $param) use ($Local_exn,$runtime) {
      throw $runtime["caml_wrap_thrown_exception"]($Local_exn) as \Throwable;
    };
    $plus_re = $call1($Js_of_ocaml_Regexp[5], $cst);
    $escape_plus = function(dynamic $s) use ($Js_of_ocaml_Regexp,$call3,$cst_2B,$plus_re) {
      return $call3($Js_of_ocaml_Regexp[12], $plus_re, $s, $cst_2B);
    };
    $unescape_plus = function(dynamic $s) use ($Js_of_ocaml_Regexp,$call3,$cst__0,$plus_re) {
      return $call3($Js_of_ocaml_Regexp[12], $plus_re, $s, $cst__0);
    };
    $b = 0;
    $c = "g";
    $d = "\\+";
    $e = $Js_of_ocaml_Js[11];
    $plus_re_js_string = (function
     (dynamic $t11, dynamic $t9, dynamic $t10, dynamic $param) {return new $t11($t9, $t10);
     })($e, $d, $c, $b);
    $unescape_plus_js_string = function(dynamic $s) use ($call1,$caml_get_public_method,$plus_re_js_string) {
      $cb = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 180472028, 238), $x);
      };
      $cc = 0;
      ((function(dynamic $t16, dynamic $t15, dynamic $param) {$t16->lastIndex = $t15;return 0;
        })($plus_re_js_string, $cc, $cb));
      $cd = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 724060212, 239), $x);
      };
      $ce = " ";
      return (function
       (dynamic $t14, dynamic $t12, dynamic $t13, dynamic $param) {return $t14->replace($t12, $t13);
       })($s, $plus_re_js_string, $ce, $cd);
    };
    $urldecode_js_string_string = function(dynamic $s) use ($Js_of_ocaml_Js,$call1,$caml_js_to_byte_string,$unescape_plus_js_string) {
      $ca = $unescape_plus_js_string($s);
      return $caml_js_to_byte_string($call1($Js_of_ocaml_Js[42], $ca));
    };
    $urldecode = function(dynamic $s) use ($Js_of_ocaml_Js,$call1,$caml_js_to_byte_string,$caml_jsbytes_of_string,$unescape_plus) {
      $b_ = $caml_jsbytes_of_string($unescape_plus($s));
      return $caml_js_to_byte_string($call1($Js_of_ocaml_Js[42], $b_));
    };
    $urlencode = function(dynamic $opt, dynamic $s) use ($Js_of_ocaml_Js,$call1,$caml_js_to_byte_string,$caml_jsbytes_of_string,$escape_plus) {
      if ($opt) {
        $sth = $opt[1];
        $with_plus = $sth;
      }
      else {$with_plus = 1;}
      return $with_plus
        ? $escape_plus(
         $caml_js_to_byte_string(
           $call1($Js_of_ocaml_Js[41], $caml_jsbytes_of_string($s))
         )
       )
        : ($caml_js_to_byte_string(
         $call1($Js_of_ocaml_Js[41], $caml_jsbytes_of_string($s))
       ));
    };
    $Not_an_http_protocol = Vector{
      248,
      $cst_Js_of_ocaml_Url_Not_an_http_protocol,
      $caml_fresh_oo_id(0)
    };
    $is_secure = function(dynamic $prot_string) use ($Not_an_http_protocol,$call1,$caml_get_public_method,$caml_js_to_byte_string,$caml_string_notequal,$cst_file,$cst_file__0,$cst_http,$cst_http__0,$cst_https,$cst_https__0,$runtime) {
      $b9 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946097238, 240), $x);
      };
      $match = $caml_js_to_byte_string(
        (function(dynamic $t17, dynamic $param) {return $t17->toLowerCase();})($prot_string, $b9)
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
    $path_of_path_string = function(dynamic $s) use ($Not_found,$String,$call3,$caml_string_notequal,$caml_wrap_exception,$cst__1,$cst__2,$f,$runtime) {
      $aux = new Ref();
      $l = $runtime["caml_ml_string_length"]($s);
      $aux->contents = function(dynamic $i) use ($Not_found,$String,$aux,$call3,$caml_wrap_exception,$l,$runtime,$s) {
        try {$b7 = $call3($String[18], $s, $i, 47);$j = $b7;}
        catch(\Throwable $b8) {
          $b8 = $caml_wrap_exception($b8);
          if ($b8 !== $Not_found) {
            throw $runtime["caml_wrap_thrown_exception_reraise"]($b8) as \Throwable;
          }
          $j = $l;
        }
        $word = $call3($String[4], $s, $i, (int) ($j - $i));
        return $l <= $j
          ? Vector{0, $word, 0}
          : (Vector{0, $word, $aux->contents((int) ($j + 1))});
      };
      $a = $aux->contents(0);
      if ($a) {
        if (! $caml_string_notequal($a[1], $cst__1)) {
          $b6 = $a[2];
          if (! $b6) {return 0;}
          if (! $caml_string_notequal($b6[1], $cst__2)) {if (! $b6[2]) {return $f;}}
        }
      }
      return $a;
    };
    $encode_arguments = function(dynamic $l) use ($List,$Pervasives,$String,$call2,$cst__3,$cst__4,$urlencode) {
      $b1 = function(dynamic $param) use ($Pervasives,$call2,$cst__3,$urlencode) {
        $v = $param[2];
        $n = $param[1];
        $b3 = $urlencode(0, $v);
        $b4 = $call2($Pervasives[16], $cst__3, $b3);
        $b5 = $urlencode(0, $n);
        return $call2($Pervasives[16], $b5, $b4);
      };
      $b2 = $call2($List[17], $b1, $l);
      return $call2($String[7], $cst__4, $b2);
    };
    $decode_arguments_js_string = function(dynamic $s) use ($Js_of_ocaml_Js,$Local_exn,$call1,$call2,$call3,$caml_get_public_method,$caml_wrap_exception,$interrupt,$runtime,$split,$split_2,$urldecode_js_string_string) {
      $aux = new Ref();
      $arr = $split(38, $s);
      $bS = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 241), $x);
      };
      $len = (function(dynamic $t18, dynamic $param) {return $t18->length;})($arr, $bS);
      $name_value_split = function(dynamic $s) use ($split_2) {
        return $split_2(61, $s);
      };
      $aux->contents = function(dynamic $acc, dynamic $idx) use ($Js_of_ocaml_Js,$Local_exn,$arr,$aux,$call2,$call3,$caml_wrap_exception,$interrupt,$name_value_split,$runtime,$urldecode_js_string_string) {
        $idx__0 = $idx;
        for (;;) {
          if (0 <= $idx__0) {
            try {
              $bT = (int) ($idx__0 + -1);
              $bU = function(dynamic $s) use ($Js_of_ocaml_Js,$call3,$interrupt,$name_value_split,$urldecode_js_string_string) {
                $bY = function(dynamic $param) use ($urldecode_js_string_string) {
                  $y = $param[2];
                  $x = $param[1];
                  $b0 = $urldecode_js_string_string($y);
                  return Vector{0, $urldecode_js_string_string($x), $b0};
                };
                $bZ = $name_value_split($s);
                return $call3($Js_of_ocaml_Js[6][7], $bZ, $interrupt, $bY);
              };
              $bV = $call2($Js_of_ocaml_Js[16], $arr, $idx__0);
              $bW = $aux->contents(
                Vector{
                  0,
                  $call3($Js_of_ocaml_Js[6][7], $bV, $interrupt, $bU),
                  $acc
                },
                $bT
              );
              return $bW;
            }
            catch(\Throwable $bX) {
              $bX = $caml_wrap_exception($bX);
              if ($bX === $Local_exn) {
                $idx__1 = (int) ($idx__0 + -1);
                $idx__0 = $idx__1;
                continue;
              }
              throw $runtime["caml_wrap_thrown_exception_reraise"]($bX) as \Throwable;
            }
          }
          return $acc;
        }
      };
      return $aux->contents(0, (int) ($len + -1));
    };
    $decode_arguments = function(dynamic $s) use ($caml_jsbytes_of_string,$decode_arguments_js_string) {
      return $decode_arguments_js_string($caml_jsbytes_of_string($s));
    };
    $g = 0;
    $h = $caml_jsbytes_of_string(
      $cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
    );
    $i = $Js_of_ocaml_Js[10];
    $url_re = (function(dynamic $t20, dynamic $t19, dynamic $param) {return new $t20($t19);
     })($i, $h, $g);
    $j = 0;
    $k = $caml_jsbytes_of_string($cst_Ff_Ii_Ll_Ee);
    $l = $Js_of_ocaml_Js[10];
    $file_re = (function(dynamic $t22, dynamic $t21, dynamic $param) {return new $t22($t21);
     })($l, $k, $j);
    $url_of_js_string = function(dynamic $s) use ($Js_of_ocaml_Js,$call1,$call2,$call3,$caml_get_public_method,$caml_int_of_string,$caml_js_to_byte_string,$caml_jsbytes_of_string,$caml_string_notequal,$cst__10,$cst__11,$cst__5,$cst__6,$cst__7,$cst__8,$cst__9,$decode_arguments_js_string,$file_re,$interrupt,$is_secure,$path_of_path_string,$url_re,$urldecode_js_string_string) {
      $bo = function(dynamic $handle) use ($Js_of_ocaml_Js,$call1,$call2,$caml_int_of_string,$caml_js_to_byte_string,$caml_jsbytes_of_string,$caml_string_notequal,$cst__5,$cst__6,$cst__7,$cst__8,$cst__9,$decode_arguments_js_string,$interrupt,$is_secure,$path_of_path_string,$urldecode_js_string_string) {
        $res = $call1($Js_of_ocaml_Js[21], $handle);
        $bD = $call2($Js_of_ocaml_Js[16], $res, 1);
        $ssl = $is_secure($call2($Js_of_ocaml_Js[6][8], $bD, $interrupt));
        $port_of_string = function(dynamic $s) use ($caml_int_of_string,$caml_string_notequal,$cst__5,$ssl) {
          return $caml_string_notequal($s, $cst__5)
            ? $caml_int_of_string($s)
            : ($ssl ? 443 : (80));
        };
        $bE = function(dynamic $param) use ($caml_jsbytes_of_string,$cst__6) {
          return $caml_jsbytes_of_string($cst__6);
        };
        $bF = $call2($Js_of_ocaml_Js[16], $res, 6);
        $path_str = $urldecode_js_string_string(
          $call2($Js_of_ocaml_Js[6][8], $bF, $bE)
        );
        $bG = function(dynamic $param) use ($caml_jsbytes_of_string,$cst__7) {
          return $caml_jsbytes_of_string($cst__7);
        };
        $bH = $call2($Js_of_ocaml_Js[16], $res, 10);
        $bI = $urldecode_js_string_string(
          $call2($Js_of_ocaml_Js[6][8], $bH, $bG)
        );
        $bJ = function(dynamic $param) use ($caml_jsbytes_of_string,$cst__8) {
          return $caml_jsbytes_of_string($cst__8);
        };
        $bK = $call2($Js_of_ocaml_Js[16], $res, 8);
        $bL = $decode_arguments_js_string(
          $call2($Js_of_ocaml_Js[6][8], $bK, $bJ)
        );
        $bM = $path_of_path_string($path_str);
        $bN = function(dynamic $param) use ($caml_jsbytes_of_string,$cst__9) {
          return $caml_jsbytes_of_string($cst__9);
        };
        $bO = $call2($Js_of_ocaml_Js[16], $res, 4);
        $bP = $port_of_string(
          $caml_js_to_byte_string($call2($Js_of_ocaml_Js[6][8], $bO, $bN))
        );
        $bQ = $call2($Js_of_ocaml_Js[16], $res, 2);
        $url = Vector{
          0,
          $urldecode_js_string_string(
            $call2($Js_of_ocaml_Js[6][8], $bQ, $interrupt)
          ),
          $bP,
          $bM,
          $path_str,
          $bL,
          $bI
        };
        $bR = $ssl ? Vector{1, $url} : (Vector{0, $url});
        return Vector{0, $bR};
      };
      $bp = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$call2,$call3,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$cst__10,$cst__11,$decode_arguments_js_string,$file_re,$interrupt,$path_of_path_string,$s,$urldecode_js_string_string) {
        $bs = function(dynamic $handle) use ($Js_of_ocaml_Js,$call1,$call2,$caml_js_to_byte_string,$caml_jsbytes_of_string,$cst__10,$cst__11,$decode_arguments_js_string,$interrupt,$path_of_path_string,$urldecode_js_string_string) {
          $res = $call1($Js_of_ocaml_Js[21], $handle);
          $bw = $call2($Js_of_ocaml_Js[16], $res, 2);
          $path_str = $urldecode_js_string_string(
            $call2($Js_of_ocaml_Js[6][8], $bw, $interrupt)
          );
          $bx = function(dynamic $param) use ($caml_jsbytes_of_string,$cst__10) {
            return $caml_jsbytes_of_string($cst__10);
          };
          $by = $call2($Js_of_ocaml_Js[16], $res, 6);
          $bz = $caml_js_to_byte_string(
            $call2($Js_of_ocaml_Js[6][8], $by, $bx)
          );
          $bA = function(dynamic $param) use ($caml_jsbytes_of_string,$cst__11) {
            return $caml_jsbytes_of_string($cst__11);
          };
          $bB = $call2($Js_of_ocaml_Js[16], $res, 4);
          $bC = $decode_arguments_js_string(
            $call2($Js_of_ocaml_Js[6][8], $bB, $bA)
          );
          return Vector{
            0,
            Vector{
              2,
              Vector{0, $path_of_path_string($path_str), $path_str, $bC, $bz}
            }
          };
        };
        $bt = function(dynamic $param) {return 0;};
        $bu = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -1021447279, 242), $x);
        };
        $bv = (function(dynamic $t26, dynamic $t25, dynamic $param) {return $t26->exec($t25);
         })($file_re, $s, $bu);
        return $call3($Js_of_ocaml_Js[5][7], $bv, $bt, $bs);
      };
      $bq = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1021447279, 243), $x);
      };
      $br = (function(dynamic $t24, dynamic $t23, dynamic $param) {return $t24->exec($t23);
       })($url_re, $s, $bq);
      return $call3($Js_of_ocaml_Js[5][7], $br, $bp, $bo);
    };
    $url_of_string = function(dynamic $s) use ($caml_jsbytes_of_string,$url_of_js_string) {
      return $url_of_js_string($caml_jsbytes_of_string($s));
    };
    $string_of_url = function(dynamic $param) use ($List,$Pervasives,$String,$call1,$call2,$caml_string_notequal,$cst__12,$cst__13,$cst__14,$cst__15,$cst__16,$cst__17,$cst__18,$cst__19,$cst__20,$cst__21,$cst__22,$cst__23,$cst__24,$cst__25,$cst__26,$cst__27,$cst__28,$cst__29,$cst__30,$cst__31,$cst__32,$cst__33,$cst__34,$cst__35,$cst_file__1,$cst_http__1,$cst_https__1,$encode_arguments,$urlencode) {
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
            $aM = $urlencode(0, $frag);
            $aN = $call2($Pervasives[16], $cst__13, $aM);
          }
          else {$aN = $cst__20;}
          if ($args) {
            $aO = $encode_arguments($args);
            $aP = $call2($Pervasives[16], $cst__14, $aO);
          }
          else {$aP = $cst__19;}
          $aQ = $call2($Pervasives[16], $aP, $aN);
          $aR = function(dynamic $x) use ($urlencode) {
            return $urlencode(0, $x);
          };
          $aS = $call2($List[17], $aR, $path);
          $aT = $call2($String[7], $cst__15, $aS);
          $aU = $call2($Pervasives[16], $aT, $aQ);
          $aV = $call2($Pervasives[16], $cst__16, $aU);
          if (80 === $port) {$aW = $cst__17;}
          else {
            $a0 = $call1($Pervasives[21], $port);
            $aW = $call2($Pervasives[16], $cst__18, $a0);
          }
          $aX = $call2($Pervasives[16], $aW, $aV);
          $aY = $urlencode(0, $host);
          $aZ = $call2($Pervasives[16], $aY, $aX);
          return $call2($Pervasives[16], $cst_http__1, $aZ);
        // FALLTHROUGH
        case 1:
          $match__0 = $param[1];
          $frag__0 = $match__0[6];
          $args__0 = $match__0[5];
          $path__0 = $match__0[3];
          $port__0 = $match__0[2];
          $host__0 = $match__0[1];
          if ($caml_string_notequal($frag__0, $cst__21)) {
            $a1 = $urlencode(0, $frag__0);
            $a2 = $call2($Pervasives[16], $cst__22, $a1);
          }
          else {$a2 = $cst__29;}
          if ($args__0) {
            $a3 = $encode_arguments($args__0);
            $a4 = $call2($Pervasives[16], $cst__23, $a3);
          }
          else {$a4 = $cst__28;}
          $a5 = $call2($Pervasives[16], $a4, $a2);
          $a6 = function(dynamic $x) use ($urlencode) {
            return $urlencode(0, $x);
          };
          $a7 = $call2($List[17], $a6, $path__0);
          $a8 = $call2($String[7], $cst__24, $a7);
          $a9 = $call2($Pervasives[16], $a8, $a5);
          $a_ = $call2($Pervasives[16], $cst__25, $a9);
          if (443 === $port__0) {$ba = $cst__26;}
          else {
            $be = $call1($Pervasives[21], $port__0);
            $ba = $call2($Pervasives[16], $cst__27, $be);
          }
          $bb = $call2($Pervasives[16], $ba, $a_);
          $bc = $urlencode(0, $host__0);
          $bd = $call2($Pervasives[16], $bc, $bb);
          return $call2($Pervasives[16], $cst_https__1, $bd);
        // FALLTHROUGH
        default:
          $match__1 = $param[1];
          $frag__1 = $match__1[4];
          $args__1 = $match__1[3];
          $path__1 = $match__1[1];
          if ($caml_string_notequal($frag__1, $cst__30)) {
            $bf = $urlencode(0, $frag__1);
            $bg = $call2($Pervasives[16], $cst__31, $bf);
          }
          else {$bg = $cst__35;}
          if ($args__1) {
            $bh = $encode_arguments($args__1);
            $bi = $call2($Pervasives[16], $cst__32, $bh);
          }
          else {$bi = $cst__34;}
          $bj = $call2($Pervasives[16], $bi, $bg);
          $bk = function(dynamic $x) use ($urlencode) {
            return $urlencode(0, $x);
          };
          $bl = $call2($List[17], $bk, $path__1);
          $bm = $call2($String[7], $cst__33, $bl);
          $bn = $call2($Pervasives[16], $bm, $bj);
          return $call2($Pervasives[16], $cst_file__1, $bn);
        }
    };
    $m = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -448369099, 244), $x);
    };
    $n = $Js_of_ocaml_Dom_html[8];
    $o = (function(dynamic $t42, dynamic $param) {return $t42->location;})($n, $m);
    $p = $call1($Js_of_ocaml_Js[6][2], $o);
    
    if ($call1($Js_of_ocaml_Js[6][5], $p)) {
      $q = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -448369099, 245), $x);
      };
      $r = $Js_of_ocaml_Dom_html[8];
      $l__0 = (function(dynamic $t41, dynamic $param) {return $t41->location;})($r, $q);
    }
    else {
      $empty = "";
      $I = Vector{0, 0, 0, 0};
      $J = function
      (dynamic $self, dynamic $href, dynamic $protocol, dynamic $host, dynamic $hostname, dynamic $port, dynamic $pathname, dynamic $search, dynamic $hash, dynamic $origin, dynamic $reload, dynamic $replace, dynamic $assign) use ($CamlinternalOO,$I,$a,$call1,$call2,$cst__37,$shared) {
        if (! $I[1]) {
          $ai = $call1($CamlinternalOO[16], $shared);
          $aj = $call2($CamlinternalOO[3], $ai, $cst__37);
          $ak = $call2($CamlinternalOO[8], $ai, $a);
          $al = $ak[1];
          $am = $ak[2];
          $an = $ak[3];
          $ao = $ak[4];
          $ap = $ak[5];
          $aq = $ak[6];
          $ar = $ak[7];
          $as = $ak[8];
          $at = $ak[9];
          $au = $ak[10];
          $av = $ak[11];
          $aw = $ak[12];
          $ax = function(dynamic $self_1) use ($aj,$call1) {
            $env = $self_1[$aj + 1];
            return $call1($env[2], $env[1]);
          };
          $ay = function(dynamic $self_1) use ($aj,$call1) {
            $env = $self_1[$aj + 1];
            return $call1($env[3], $env[1]);
          };
          $az = function(dynamic $self_1) use ($aj,$call1) {
            $env = $self_1[$aj + 1];
            return $call1($env[4], $env[1]);
          };
          $aA = function(dynamic $self_1) use ($aj) {
            $env = $self_1[$aj + 1];
            return $env[5];
          };
          $aB = function(dynamic $self_1) use ($aj) {
            $env = $self_1[$aj + 1];
            return $env[6];
          };
          $aC = function(dynamic $self_1) use ($aj) {
            $env = $self_1[$aj + 1];
            return $env[7];
          };
          $aD = function(dynamic $self_1) use ($aj) {
            $env = $self_1[$aj + 1];
            return $env[8];
          };
          $aE = function(dynamic $self_1) use ($aj) {
            $env = $self_1[$aj + 1];
            return $env[9];
          };
          $aF = function(dynamic $self_1) use ($aj) {
            $env = $self_1[$aj + 1];
            return $env[10];
          };
          $aG = function(dynamic $self_1) use ($aj) {
            $env = $self_1[$aj + 1];
            return $env[11];
          };
          $aH = function(dynamic $self_1) use ($aj) {
            $env = $self_1[$aj + 1];
            return $env[12];
          };
          $aI = Vector{
            0,
            $as,
            function(dynamic $self_1) use ($aj) {
              $env = $self_1[$aj + 1];
              return $env[13];
            },
            $ao,
            $aH,
            $au,
            $aG,
            $at,
            $aF,
            $ap,
            $aE,
            $aq,
            $aD,
            $al,
            $aC,
            $av,
            $aB,
            $ar,
            $aA,
            $an,
            $az,
            $am,
            $ay,
            $aw,
            $ax
          };
          $call2($CamlinternalOO[11], $ai, $aI);
          $aJ = function(dynamic $aK) use ($CamlinternalOO,$ai,$aj,$call2) {
            $aL = $call2($CamlinternalOO[24], 0, $ai);
            $aL[$aj + 1] = $aK;
            return $aL;
          };
          $call1($CamlinternalOO[17], $ai);
          $I[1] = $aJ;
        }
        return $call1(
          $I[1],
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
      $K = function(dynamic $param, dynamic $ah) {return 0;};
      $L = function(dynamic $param, dynamic $ag) {return 0;};
      $M = function(dynamic $param) {return 0;};
      $N = $Js_of_ocaml_Js[3];
      $l__0 = (function
       (dynamic $t29, dynamic $t30, dynamic $t31, dynamic $t32, dynamic $t33, dynamic $t34, dynamic $t35, dynamic $t36, dynamic $t37, dynamic $t38, dynamic $t39, dynamic $t40, dynamic $param) use ($caml_js_wrap_meth_callback) {
         return darray[
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
        $N,
        $M,
        $L,
        $K,
        $J
      );
    }
    
    $s = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -757983821, 246), $x);
    };
    $host = $urldecode_js_string_string(
      (function(dynamic $t43, dynamic $param) {return $t43->hostname;})($l__0, $s)
    );
    $t = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 6510168, 247), $x);
    };
    $protocol = $urldecode_js_string_string(
      (function(dynamic $t44, dynamic $param) {return $t44->protocol;})($l__0, $t)
    );
    $u = 0;
    $port = (function(dynamic $param) use ($Failure,$call1,$caml_get_public_method,$caml_int_of_string,$caml_js_to_byte_string,$caml_wrap_exception,$l__0,$runtime) {
       try {
         $ad = function(dynamic $x) use ($call1,$caml_get_public_method) {
           return $call1($caml_get_public_method($x, -899906687, 248), $x);
         };
         $ae = Vector{
           0,
           $caml_int_of_string(
             $caml_js_to_byte_string(
               (function(dynamic $t45, dynamic $param) {return $t45->port;})($l__0, $ad)
             )
           )
         };
         return $ae;
       }
       catch(\Throwable $af) {
         $af = $caml_wrap_exception($af);
         if ($af[1] === $Failure) {return 0;}
         throw $runtime["caml_wrap_thrown_exception_reraise"]($af) as \Throwable;
       }
     })($u);
    $v = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -742027664, 249), $x);
    };
    $path_string = $urldecode_js_string_string(
      (function(dynamic $t46, dynamic $param) {return $t46->pathname;})($l__0, $v)
    );
    $path = $path_of_path_string($path_string);
    $w = "?";
    $x = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 930445673, 250), $x);
    };
    $y = 0;
    $z = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -487088280, 251), $x);
    };
    $A = (function(dynamic $t51, dynamic $param) {return $t51->search;})($l__0, $z);
    
    if (
      (function(dynamic $t53, dynamic $t52, dynamic $param) {return $t53->charAt($t52);
       })($A, $y, $x) === $w
    ) {
      $B = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -303194578, 252), $x);
      };
      $C = 1;
      $D = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -487088280, 253), $x);
      };
      $E = (function(dynamic $t48, dynamic $param) {return $t48->search;})($l__0, $D);
      $F = (function(dynamic $t50, dynamic $t49, dynamic $param) {return $t50->slice($t49);
       })($E, $C, $B);
    }
    else {
      $H = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -487088280, 260), $x);
      };
      $F = (function(dynamic $t47, dynamic $param) {return $t47->search;})($l__0, $H);
    }
    
    $arguments__0 = $decode_arguments_js_string($F);
    $get_fragment = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$call3,$caml_get_public_method,$cst__36,$l__0,$runtime) {
      $T = function(dynamic $res) use ($Js_of_ocaml_Js,$call1,$runtime) {
        $res__0 = $call1($Js_of_ocaml_Js[21], $res);
        return $runtime["caml_js_to_string"]($res__0[1]);
      };
      $U = function(dynamic $param) use ($cst__36) {return $cst__36;};
      $V = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -16084858, 254), $x);
      };
      $W = 0;
      $X = "#(.*)";
      $Y = $Js_of_ocaml_Js[10];
      $Z = (function(dynamic $t56, dynamic $t55, dynamic $param) {return new $t56($t55);
       })($Y, $X, $W);
      $aa = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -988476949, 255), $x);
      };
      $ab = (function(dynamic $t54, dynamic $param) {return $t54->href;})($l__0, $aa);
      $ac = (function(dynamic $t58, dynamic $t57, dynamic $param) {return $t58->match($t57);
       })($ab, $Z, $V);
      return $call3($Js_of_ocaml_Js[5][7], $ac, $U, $T);
    };
    $set_fragment = function(dynamic $s) use ($call1,$caml_get_public_method,$caml_jsbytes_of_string,$l__0,$urlencode) {
      $R = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -989319218, 256), $x);
      };
      $S = $caml_jsbytes_of_string($urlencode(0, $s));
      return (function(dynamic $t60, dynamic $t59, dynamic $param) {$t60->hash = $t59;return 0;
       })($l__0, $S, $R);
    };
    $get = function(dynamic $param) use ($call1,$caml_get_public_method,$l__0,$url_of_js_string) {
      $Q = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -988476949, 257), $x);
      };
      return $url_of_js_string(
        (function(dynamic $t61, dynamic $param) {return $t61->href;})($l__0, $Q)
      );
    };
    $set = function(dynamic $u) use ($call1,$caml_get_public_method,$caml_jsbytes_of_string,$l__0,$string_of_url) {
      $O = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -988476949, 258), $x);
      };
      $P = $caml_jsbytes_of_string($string_of_url($u));
      return (function(dynamic $t63, dynamic $t62, dynamic $param) {$t63->href = $t62;return 0;
       })($l__0, $P, $O);
    };
    $G = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -988476949, 259), $x);
    };
    $as_string = $urldecode_js_string_string(
      (function(dynamic $t64, dynamic $param) {return $t64->href;})($l__0, $G)
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

