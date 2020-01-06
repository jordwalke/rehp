<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Url {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
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
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
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
    } as dynamic;
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
    $Js_of_ocaml_Js = Js_of_ocaml__Js::get();
    $Failure = Failure::get();
    $CamlinternalOO = CamlinternalOO::get();
    $Pervasives = Pervasives::get();
    $List = List_::get();
    $String = String_::get();
    $Not_found = Not_found::get();
    $Js_of_ocaml_Regexp = Js_of_ocaml__Regexp::get();
    $Js_of_ocaml_Dom_html = Js_of_ocaml__Dom_html::get();
    $f_ = Vector{0, $string(""), 0} as dynamic;
    $a_ = Vector{
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
    } as dynamic;
    $split = (dynamic $c, dynamic $s) ==> {
      $cn_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 24046298, 234), $x);
      };
      $co_ = $call2($String[1], 1, $c)->toString();
      $cp_ = ((dynamic $t1, dynamic $t0, dynamic $param) ==> {return $t1->split($t0);
       })($s, $co_, $cn_);
      return $call1($Js_of_ocaml_Js[20], $cp_);
    };
    $split_2 = (dynamic $c, dynamic $s) ==> {
      $cf_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -524334903, 235), $x);
      };
      $cg_ = $call2($String[1], 1, $c)->toString();
      $index = ((dynamic $t8, dynamic $t7, dynamic $param) ==> {return $t8->indexOf($t7);
       })($s, $cg_, $cf_);
      if (0 <= $index) {
        $ch_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -303194578, 236), $x);
        };
        $ci_ = (int) ($index + 1) as dynamic;
        $cj_ = ((dynamic $t6, dynamic $t5, dynamic $param) ==> {return $t6->slice($t5);
         })($s, $ci_, $ch_);
        $ck_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -20462510, 237), $x);
        };
        $cl_ = 0 as dynamic;
        $cm_ = Vector{
          0,
          ((dynamic $t4, dynamic $t2, dynamic $t3, dynamic $param) ==> {return $t4->slice($t2, $t3);
           })($s, $cl_, $index, $ck_),
          $cj_
        } as dynamic;
        return $call1($Js_of_ocaml_Js[4], $cm_);
      }
      return $Js_of_ocaml_Js[3];
    };
    $Local_exn = Vector{
      248,
      $cst_Js_of_ocaml_Url_Local_exn,
      $caml_fresh_oo_id(0)
    } as dynamic;
    $interrupt = (dynamic $param) ==> {
      throw $caml_wrap_thrown_exception($Local_exn) as \Throwable;
    };
    $plus_re = $call1($Js_of_ocaml_Regexp[5], $cst);
    $escape_plus = (dynamic $s) ==> {
      return $call3($Js_of_ocaml_Regexp[12], $plus_re, $s, $cst_2B);
    };
    $unescape_plus = (dynamic $s) ==> {
      return $call3($Js_of_ocaml_Regexp[12], $plus_re, $s, $cst__0);
    };
    $b_ = 0 as dynamic;
    $c_ = "g";
    $d_ = "\\+";
    $e_ = $Js_of_ocaml_Js[11];
    $plus_re_js_string = (
     (dynamic $t11, dynamic $t9, dynamic $t10, dynamic $param) ==> {return new $t11($t9, $t10);
     })($e_, $d_, $c_, $b_);
    $unescape_plus_js_string = (dynamic $s) ==> {
      $cb_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 180472028, 238), $x);
      };
      $cc_ = 0 as dynamic;
      (((dynamic $t16, dynamic $t15, dynamic $param) ==> {$t16->lastIndex = $t15;return 0;
        })($plus_re_js_string, $cc_, $cb_));
      $cd_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 724060212, 239), $x);
      };
      $ce_ = " ";
      return ((dynamic $t14, dynamic $t12, dynamic $t13, dynamic $param) ==> {return $t14->replace($t12, $t13);
       })($s, $plus_re_js_string, $ce_, $cd_);
    };
    $urldecode_js_string_string = (dynamic $s) ==> {
      $ca_ = $unescape_plus_js_string($s);
      return $caml_js_to_byte_string($call1($Js_of_ocaml_Js[42], $ca_));
    };
    $urldecode = (dynamic $s) ==> {
      $b__ = $caml_jsbytes_of_string($unescape_plus($s));
      return $caml_js_to_byte_string($call1($Js_of_ocaml_Js[42], $b__));
    };
    $urlencode = (dynamic $opt, dynamic $s) ==> {
      if ($opt) {
        $sth = $opt[1];
        $with_plus = $sth;
      }
      else {$with_plus = 1 as dynamic;}
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
    } as dynamic;
    $is_secure = (dynamic $prot_string) ==> {
      $b9_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 946097238, 240), $x);
      };
      $match = $caml_js_to_byte_string(
        ((dynamic $t17, dynamic $param) ==> {return $t17->toLowerCase();})($prot_string, $b9_)
      );
      if ($caml_string_notequal($match, $cst_file)) {
        if ($caml_string_notequal($match, $cst_file__0)) {
          if ($caml_string_notequal($match, $cst_http)) {
            if ($caml_string_notequal($match, $cst_http__0)) {
              if ($caml_string_notequal($match, $cst_https)) {
                if ($caml_string_notequal($match, $cst_https__0)) {
                  $switch__0 = 1 as dynamic;
                  $switch__1 = 0 as dynamic;
                }
                else {$switch__1 = 1 as dynamic;}
              }
              else {$switch__1 = 1 as dynamic;}
              if ($switch__1) {return 1;}
            }
            else {$switch__0 = 0 as dynamic;}
          }
          else {$switch__0 = 0 as dynamic;}
          if (! $switch__0) {return 0;}
        }
      }
      throw $caml_wrap_thrown_exception($Not_an_http_protocol) as \Throwable;
    };
    $default_http_port = 80 as dynamic;
    $default_https_port = 443 as dynamic;
    $path_of_path_string = (dynamic $s) ==> {
      $aux = new Ref();
      $l = $runtime["caml_ml_string_length"]($s);
      $aux->contents = (dynamic $i) ==> {
        try {$b7_ = $call3($String[18], $s, $i, 47);$j = $b7_;}
        catch(\Throwable $b8_) {
          $b8_ = $runtime["caml_wrap_exception"]($b8_);
          if ($b8_ !== $Not_found) {
            throw $caml_wrap_thrown_exception_reraise($b8_) as \Throwable;
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
          $b6_ = $a[2];
          if (! $b6_) {return 0;}
          if (! $caml_string_notequal($b6_[1], $cst__2)) {if (! $b6_[2]) {return $f_;}}
        }
      }
      return $a;
    };
    $encode_arguments = (dynamic $l) ==> {
      $b1_ = (dynamic $param) ==> {
        $v = $param[2];
        $n = $param[1];
        $b3_ = $urlencode(0, $v);
        $b4_ = $call2($Pervasives[16], $cst__3, $b3_);
        $b5_ = $urlencode(0, $n);
        return $call2($Pervasives[16], $b5_, $b4_);
      };
      $b2_ = $call2($List[17], $b1_, $l);
      return $call2($String[7], $cst__4, $b2_);
    };
    $decode_arguments_js_string = (dynamic $s) ==> {
      $aux = new Ref();
      $arr = $split(38, $s);
      $bS_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 520590566, 241), $x);
      };
      $len = ((dynamic $t18, dynamic $param) ==> {return $t18->length;})($arr, $bS_);
      $name_value_split = (dynamic $s) ==> {return $split_2(61, $s);};
      $aux->contents = (dynamic $acc, dynamic $idx) ==> {
        $idx__0 = $idx;
        for (;;) {
          if (0 <= $idx__0) {
            try {
              $bT_ = (int) ($idx__0 + -1) as dynamic;
              $bU_ = (dynamic $s) ==> {
                $bY_ = (dynamic $param) ==> {
                  $y = $param[2];
                  $x = $param[1];
                  $b0_ = $urldecode_js_string_string($y);
                  return Vector{0, $urldecode_js_string_string($x), $b0_};
                };
                $bZ_ = $name_value_split($s);
                return $call3($Js_of_ocaml_Js[6][7], $bZ_, $interrupt, $bY_);
              };
              $bV_ = $call2($Js_of_ocaml_Js[16], $arr, $idx__0);
              $bW_ = $aux->contents(
                Vector{
                  0,
                  $call3($Js_of_ocaml_Js[6][7], $bV_, $interrupt, $bU_),
                  $acc
                },
                $bT_
              );
              return $bW_;
            }
            catch(\Throwable $bX_) {
              $bX_ = $runtime["caml_wrap_exception"]($bX_);
              if ($bX_ === $Local_exn) {
                $idx__1 = (int) ($idx__0 + -1) as dynamic;
                $idx__0 = $idx__1;
                continue;
              }
              throw $caml_wrap_thrown_exception_reraise($bX_) as \Throwable;
            }
          }
          return $acc;
        }
      };
      return $aux->contents(0, (int) ($len + -1));
    };
    $decode_arguments = (dynamic $s) ==> {
      return $decode_arguments_js_string($caml_jsbytes_of_string($s));
    };
    $g_ = 0 as dynamic;
    $h_ = $caml_jsbytes_of_string(
      $cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
    );
    $i_ = $Js_of_ocaml_Js[10];
    $url_re = ((dynamic $t20, dynamic $t19, dynamic $param) ==> {return new $t20($t19);
     })($i_, $h_, $g_);
    $j_ = 0 as dynamic;
    $k_ = $caml_jsbytes_of_string($cst_Ff_Ii_Ll_Ee);
    $l_ = $Js_of_ocaml_Js[10];
    $file_re = ((dynamic $t22, dynamic $t21, dynamic $param) ==> {return new $t22($t21);
     })($l_, $k_, $j_);
    $url_of_js_string = (dynamic $s) ==> {
      $bo_ = (dynamic $handle) ==> {
        $res = $call1($Js_of_ocaml_Js[21], $handle);
        $bD_ = $call2($Js_of_ocaml_Js[16], $res, 1);
        $ssl = $is_secure($call2($Js_of_ocaml_Js[6][8], $bD_, $interrupt));
        $port_of_string = (dynamic $s) ==> {
          return $caml_string_notequal($s, $cst__5)
            ? $caml_int_of_string($s)
            : ($ssl ? 443 : (80));
        };
        $bE_ = (dynamic $param) ==> {return $caml_jsbytes_of_string($cst__6);};
        $bF_ = $call2($Js_of_ocaml_Js[16], $res, 6);
        $path_str = $urldecode_js_string_string(
          $call2($Js_of_ocaml_Js[6][8], $bF_, $bE_)
        );
        $bG_ = (dynamic $param) ==> {return $caml_jsbytes_of_string($cst__7);};
        $bH_ = $call2($Js_of_ocaml_Js[16], $res, 10);
        $bI_ = $urldecode_js_string_string(
          $call2($Js_of_ocaml_Js[6][8], $bH_, $bG_)
        );
        $bJ_ = (dynamic $param) ==> {return $caml_jsbytes_of_string($cst__8);};
        $bK_ = $call2($Js_of_ocaml_Js[16], $res, 8);
        $bL_ = $decode_arguments_js_string(
          $call2($Js_of_ocaml_Js[6][8], $bK_, $bJ_)
        );
        $bM_ = $path_of_path_string($path_str);
        $bN_ = (dynamic $param) ==> {return $caml_jsbytes_of_string($cst__9);};
        $bO_ = $call2($Js_of_ocaml_Js[16], $res, 4);
        $bP_ = $port_of_string(
          $caml_js_to_byte_string($call2($Js_of_ocaml_Js[6][8], $bO_, $bN_))
        );
        $bQ_ = $call2($Js_of_ocaml_Js[16], $res, 2);
        $url = Vector{
          0,
          $urldecode_js_string_string(
            $call2($Js_of_ocaml_Js[6][8], $bQ_, $interrupt)
          ),
          $bP_,
          $bM_,
          $path_str,
          $bL_,
          $bI_
        } as dynamic;
        $bR_ = $ssl ? Vector{1, $url} : (Vector{0, $url});
        return Vector{0, $bR_};
      };
      $bp_ = (dynamic $param) ==> {
        $bs_ = (dynamic $handle) ==> {
          $res = $call1($Js_of_ocaml_Js[21], $handle);
          $bw_ = $call2($Js_of_ocaml_Js[16], $res, 2);
          $path_str = $urldecode_js_string_string(
            $call2($Js_of_ocaml_Js[6][8], $bw_, $interrupt)
          );
          $bx_ = (dynamic $param) ==> {
            return $caml_jsbytes_of_string($cst__10);
          };
          $by_ = $call2($Js_of_ocaml_Js[16], $res, 6);
          $bz_ = $caml_js_to_byte_string(
            $call2($Js_of_ocaml_Js[6][8], $by_, $bx_)
          );
          $bA_ = (dynamic $param) ==> {
            return $caml_jsbytes_of_string($cst__11);
          };
          $bB_ = $call2($Js_of_ocaml_Js[16], $res, 4);
          $bC_ = $decode_arguments_js_string(
            $call2($Js_of_ocaml_Js[6][8], $bB_, $bA_)
          );
          return Vector{
            0,
            Vector{
              2,
              Vector{0, $path_of_path_string($path_str), $path_str, $bC_, $bz_
              }
            }
          };
        };
        $bt_ = (dynamic $param) ==> {return 0;};
        $bu_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -1021447279, 242), $x);
        };
        $bv_ = ((dynamic $t26, dynamic $t25, dynamic $param) ==> {return $t26->exec($t25);
         })($file_re, $s, $bu_);
        return $call3($Js_of_ocaml_Js[5][7], $bv_, $bt_, $bs_);
      };
      $bq_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -1021447279, 243), $x);
      };
      $br_ = ((dynamic $t24, dynamic $t23, dynamic $param) ==> {return $t24->exec($t23);
       })($url_re, $s, $bq_);
      return $call3($Js_of_ocaml_Js[5][7], $br_, $bp_, $bo_);
    };
    $url_of_string = (dynamic $s) ==> {
      return $url_of_js_string($caml_jsbytes_of_string($s));
    };
    $string_of_url = (dynamic $param) ==> {
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
            $aM_ = $urlencode(0, $frag);
            $aN_ = $call2($Pervasives[16], $cst__13, $aM_);
          }
          else {$aN_ = $cst__20;}
          if ($args) {
            $aO_ = $encode_arguments($args);
            $aP_ = $call2($Pervasives[16], $cst__14, $aO_);
          }
          else {$aP_ = $cst__19;}
          $aQ_ = $call2($Pervasives[16], $aP_, $aN_);
          $aR_ = (dynamic $x) ==> {return $urlencode(0, $x);};
          $aS_ = $call2($List[17], $aR_, $path);
          $aT_ = $call2($String[7], $cst__15, $aS_);
          $aU_ = $call2($Pervasives[16], $aT_, $aQ_);
          $aV_ = $call2($Pervasives[16], $cst__16, $aU_);
          if (80 === $port) {$aW_ = $cst__17;}
          else {
            $a0_ = $call1($Pervasives[21], $port);
            $aW_ = $call2($Pervasives[16], $cst__18, $a0_);
          }
          $aX_ = $call2($Pervasives[16], $aW_, $aV_);
          $aY_ = $urlencode(0, $host);
          $aZ_ = $call2($Pervasives[16], $aY_, $aX_);
          return $call2($Pervasives[16], $cst_http__1, $aZ_);
        // FALLTHROUGH
        case 1:
          $match__0 = $param[1];
          $frag__0 = $match__0[6];
          $args__0 = $match__0[5];
          $path__0 = $match__0[3];
          $port__0 = $match__0[2];
          $host__0 = $match__0[1];
          if ($caml_string_notequal($frag__0, $cst__21)) {
            $a1_ = $urlencode(0, $frag__0);
            $a2_ = $call2($Pervasives[16], $cst__22, $a1_);
          }
          else {$a2_ = $cst__29;}
          if ($args__0) {
            $a3_ = $encode_arguments($args__0);
            $a4_ = $call2($Pervasives[16], $cst__23, $a3_);
          }
          else {$a4_ = $cst__28;}
          $a5_ = $call2($Pervasives[16], $a4_, $a2_);
          $a6_ = (dynamic $x) ==> {return $urlencode(0, $x);};
          $a7_ = $call2($List[17], $a6_, $path__0);
          $a8_ = $call2($String[7], $cst__24, $a7_);
          $a9_ = $call2($Pervasives[16], $a8_, $a5_);
          $a__ = $call2($Pervasives[16], $cst__25, $a9_);
          if (443 === $port__0) {$ba_ = $cst__26;}
          else {
            $be_ = $call1($Pervasives[21], $port__0);
            $ba_ = $call2($Pervasives[16], $cst__27, $be_);
          }
          $bb_ = $call2($Pervasives[16], $ba_, $a__);
          $bc_ = $urlencode(0, $host__0);
          $bd_ = $call2($Pervasives[16], $bc_, $bb_);
          return $call2($Pervasives[16], $cst_https__1, $bd_);
        // FALLTHROUGH
        default:
          $match__1 = $param[1];
          $frag__1 = $match__1[4];
          $args__1 = $match__1[3];
          $path__1 = $match__1[1];
          if ($caml_string_notequal($frag__1, $cst__30)) {
            $bf_ = $urlencode(0, $frag__1);
            $bg_ = $call2($Pervasives[16], $cst__31, $bf_);
          }
          else {$bg_ = $cst__35;}
          if ($args__1) {
            $bh_ = $encode_arguments($args__1);
            $bi_ = $call2($Pervasives[16], $cst__32, $bh_);
          }
          else {$bi_ = $cst__34;}
          $bj_ = $call2($Pervasives[16], $bi_, $bg_);
          $bk_ = (dynamic $x) ==> {return $urlencode(0, $x);};
          $bl_ = $call2($List[17], $bk_, $path__1);
          $bm_ = $call2($String[7], $cst__33, $bl_);
          $bn_ = $call2($Pervasives[16], $bm_, $bj_);
          return $call2($Pervasives[16], $cst_file__1, $bn_);
        }
    };
    $m_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -448369099, 244), $x);
    };
    $n_ = $Js_of_ocaml_Dom_html[8];
    $o_ = ((dynamic $t42, dynamic $param) ==> {return $t42->location;})($n_, $m_);
    $p_ = $call1($Js_of_ocaml_Js[6][2], $o_);
    
    if ($call1($Js_of_ocaml_Js[6][5], $p_)) {
      $q_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -448369099, 245), $x);
      };
      $r_ = $Js_of_ocaml_Dom_html[8];
      $l = ((dynamic $t41, dynamic $param) ==> {return $t41->location;})($r_, $q_);
    }
    else {
      $empty = "";
      $I_ = Vector{0, 0, 0, 0} as dynamic;
      $J_ = 
      (dynamic $self, dynamic $href, dynamic $protocol, dynamic $host, dynamic $hostname, dynamic $port, dynamic $pathname, dynamic $search, dynamic $hash, dynamic $origin, dynamic $reload, dynamic $replace, dynamic $assign) ==> {
        if (! $I_[1]) {
          $ai_ = $call1($CamlinternalOO[16], $shared);
          $aj_ = $call2($CamlinternalOO[3], $ai_, $cst__37);
          $ak_ = $call2($CamlinternalOO[8], $ai_, $a_);
          $al_ = $ak_[1];
          $am_ = $ak_[2];
          $an_ = $ak_[3];
          $ao_ = $ak_[4];
          $ap_ = $ak_[5];
          $aq_ = $ak_[6];
          $ar_ = $ak_[7];
          $as_ = $ak_[8];
          $at_ = $ak_[9];
          $au_ = $ak_[10];
          $av_ = $ak_[11];
          $aw_ = $ak_[12];
          $ax_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $call1($env[2], $env[1]);
          };
          $ay_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $call1($env[3], $env[1]);
          };
          $az_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $call1($env[4], $env[1]);
          };
          $aA_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $env[5];
          };
          $aB_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $env[6];
          };
          $aC_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $env[7];
          };
          $aD_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $env[8];
          };
          $aE_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $env[9];
          };
          $aF_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $env[10];
          };
          $aG_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $env[11];
          };
          $aH_ = (dynamic $self_1) ==> {
            $env = $self_1[$aj_ + 1];
            return $env[12];
          };
          $aI_ = Vector{
            0,
            $as_,
            (dynamic $self_1) ==> {$env = $self_1[$aj_ + 1];return $env[13];},
            $ao_,
            $aH_,
            $au_,
            $aG_,
            $at_,
            $aF_,
            $ap_,
            $aE_,
            $aq_,
            $aD_,
            $al_,
            $aC_,
            $av_,
            $aB_,
            $ar_,
            $aA_,
            $an_,
            $az_,
            $am_,
            $ay_,
            $aw_,
            $ax_
          } as dynamic;
          $call2($CamlinternalOO[11], $ai_, $aI_);
          $aJ_ = (dynamic $aK_) ==> {
            $aL_ = $call2($CamlinternalOO[24], 0, $ai_);
            $aL_[$aj_ + 1] = $aK_;
            return $aL_;
          };
          $call1($CamlinternalOO[17], $ai_);
          $I_[1] = $aJ_;
        }
        return $call1(
          $I_[1],
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
      $K_ = (dynamic $param, dynamic $ah_) ==> {return 0;};
      $L_ = (dynamic $param, dynamic $ag_) ==> {return 0;};
      $M_ = (dynamic $param) ==> {return 0;};
      $N_ = $Js_of_ocaml_Js[3];
      $l = (
       (dynamic $t29, dynamic $t30, dynamic $t31, dynamic $t32, dynamic $t33, dynamic $t34, dynamic $t35, dynamic $t36, dynamic $t37, dynamic $t38, dynamic $t39, dynamic $t40, dynamic $param) ==> {
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
        $N_,
        $M_,
        $L_,
        $K_,
        $J_
      );
    }
    
    $s_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -757983821, 246), $x);
    };
    $host = $urldecode_js_string_string(
      ((dynamic $t43, dynamic $param) ==> {return $t43->hostname;})($l, $s_)
    );
    $t_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 6510168, 247), $x);
    };
    $protocol = $urldecode_js_string_string(
      ((dynamic $t44, dynamic $param) ==> {return $t44->protocol;})($l, $t_)
    );
    $u_ = 0 as dynamic;
    $port = ((dynamic $param) ==> {
       try {
         $ad_ = (dynamic $x) ==> {
           return $call1($caml_get_public_method($x, -899906687, 248), $x);
         };
         $ae_ = Vector{
           0,
           $caml_int_of_string(
             $caml_js_to_byte_string(
               ((dynamic $t45, dynamic $param) ==> {return $t45->port;})($l, $ad_)
             )
           )
         } as dynamic;
         return $ae_;
       }
       catch(\Throwable $af_) {
         $af_ = $runtime["caml_wrap_exception"]($af_);
         if ($af_[1] === $Failure) {return 0;}
         throw $caml_wrap_thrown_exception_reraise($af_) as \Throwable;
       }
     })($u_);
    $v_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -742027664, 249), $x);
    };
    $path_string = $urldecode_js_string_string(
      ((dynamic $t46, dynamic $param) ==> {return $t46->pathname;})($l, $v_)
    );
    $path = $path_of_path_string($path_string);
    $w_ = "?";
    $x_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 930445673, 250), $x);
    };
    $y_ = 0 as dynamic;
    $z_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -487088280, 251), $x);
    };
    $A_ = ((dynamic $t51, dynamic $param) ==> {return $t51->search;})($l, $z_);
    
    if (
      ((dynamic $t53, dynamic $t52, dynamic $param) ==> {return $t53->charAt($t52);
       })($A_, $y_, $x_) === $w_
    ) {
      $B_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -303194578, 252), $x);
      };
      $C_ = 1 as dynamic;
      $D_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -487088280, 253), $x);
      };
      $E_ = ((dynamic $t48, dynamic $param) ==> {return $t48->search;})($l, $D_);
      $F_ = ((dynamic $t50, dynamic $t49, dynamic $param) ==> {return $t50->slice($t49);
       })($E_, $C_, $B_);
    }
    else {
      $H_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -487088280, 260), $x);
      };
      $F_ = ((dynamic $t47, dynamic $param) ==> {return $t47->search;})($l, $H_);
    }
    
    $arguments__0 = $decode_arguments_js_string($F_);
    $get_fragment = (dynamic $param) ==> {
      $T_ = (dynamic $res) ==> {
        $res__0 = $call1($Js_of_ocaml_Js[21], $res);
        return $runtime["caml_js_to_string"]($res__0[1]);
      };
      $U_ = (dynamic $param) ==> {return $cst__36;};
      $V_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -16084858, 254), $x);
      };
      $W_ = 0 as dynamic;
      $X_ = "#(.*)";
      $Y_ = $Js_of_ocaml_Js[10];
      $Z_ = ((dynamic $t56, dynamic $t55, dynamic $param) ==> {return new $t56($t55);
       })($Y_, $X_, $W_);
      $aa_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -988476949, 255), $x);
      };
      $ab_ = ((dynamic $t54, dynamic $param) ==> {return $t54->href;})($l, $aa_);
      $ac_ = ((dynamic $t58, dynamic $t57, dynamic $param) ==> {return $t58->match($t57);
       })($ab_, $Z_, $V_);
      return $call3($Js_of_ocaml_Js[5][7], $ac_, $U_, $T_);
    };
    $set_fragment = (dynamic $s) ==> {
      $R_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -989319218, 256), $x);
      };
      $S_ = $caml_jsbytes_of_string($urlencode(0, $s));
      return ((dynamic $t60, dynamic $t59, dynamic $param) ==> {$t60->hash = $t59;return 0;
       })($l, $S_, $R_);
    };
    $get = (dynamic $param) ==> {
      $Q_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -988476949, 257), $x);
      };
      return $url_of_js_string(
        ((dynamic $t61, dynamic $param) ==> {return $t61->href;})($l, $Q_)
      );
    };
    $set = (dynamic $u) ==> {
      $O_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -988476949, 258), $x);
      };
      $P_ = $caml_jsbytes_of_string($string_of_url($u));
      return ((dynamic $t63, dynamic $t62, dynamic $param) ==> {$t63->href = $t62;return 0;
       })($l, $P_, $O_);
    };
    $G_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -988476949, 259), $x);
    };
    $as_string = $urldecode_js_string_string(
      ((dynamic $t64, dynamic $param) ==> {return $t64->href;})($l, $G_)
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
    } as dynamic;
    
    return($Js_of_ocaml_Url);

  }
  public static function urldecode(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 1, $s);
  }
  public static function urlencode(dynamic $opt, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 2, $opt, $s);
  }
  public static function path_of_path_string(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 5, $s);
  }
  public static function encode_arguments(dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 6, $l);
  }
  public static function decode_arguments(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 7, $s);
  }
  public static function url_of_string(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 8, $s);
  }
  public static function string_of_url(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 9, $param);
  }

}
/* Hashing disabled */
