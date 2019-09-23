<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Form.php
 */

namespace Rehack;

final class Js_of_ocaml__Form {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $Js_of_ocaml__Dom_html = Js_of_ocaml__Dom_html::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $List_ = List_::get();
    $Assert_failure = Assert_failure::get();
    Js_of_ocaml__Form::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Form;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $filter_map = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $string = $runtime["caml_new_string"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $is_int = $runtime["is_int"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_checkbox = $string("checkbox");
    $cst_file = $string("file");
    $cst_password = $string("password");
    $cst_radio = $string("radio");
    $cst_reset = $string("reset");
    $cst_submit = $string("submit");
    $cst_text = $string("text");
    $Assert_failure = $global_data["Assert_failure"];
    $List = $global_data["List_"];
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Js_of_ocaml_Dom_html = $global_data["Js_of_ocaml__Dom_html"];
    $Array = $global_data["Array_"];
    $f = Vector{0, $string("lib/js_of_ocaml/form.ml"), 170, 58};
    $e = Vector{0, 1};
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -137852659, 168), $x);
    };
    $b = $Js_of_ocaml_Js[50][1];
    $formData = (function(dynamic $t0, dynamic $param) {return $t0->FormData;})($b, $a);
    $c = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -137852659, 169), $x);
    };
    $d = $Js_of_ocaml_Js[50][1];
    $formData_form = (function(dynamic $t1, dynamic $param) {return $t1->FormData;
     })($d, $c);
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
    $have_content = function(dynamic $elt) use ($call1,$caml_get_public_method) {
      $at = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 170), $x);
      };
      $au = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -922783157, 171), $x);
      };
      $av = (function(dynamic $t2, dynamic $param) {return $t2->name;})($elt, $au);
      $aw = 0 <
         (function(dynamic $t3, dynamic $param) {return $t3->length;})($av, $at)
        ? 1
        : (0);
      if ($aw) {
        $ax = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -66829956, 172), $x);
        };
        $ay = 1 -
          (int)
          (function(dynamic $t4, dynamic $param) {return $t4->disabled;})($elt, $ax);
      }
      else {$ay = $aw;}
      return $ay;
    };
    $get_textarea_val = function(dynamic $elt) use ($call1,$caml_get_public_method,$caml_js_to_string,$have_content) {
      if ($have_content($elt)) {
        $aq = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -922783157, 173), $x);
        };
        $name = $caml_js_to_string(
          (function(dynamic $t6, dynamic $param) {return $t6->name;})($elt, $aq)
        );
        $ar = 0;
        $as = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 834174833, 174), $x);
        };
        return Vector{
          0,
          Vector{
            0,
            $name,
            Vector{
              0,
              -976970511,
              (function(dynamic $t5, dynamic $param) {return $t5->value;})($elt, $as)
            }
          },
          $ar
        };
      }
      return 0;
    };
    $get_select_val = function(dynamic $elt) use ($Array,$Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$caml_js_to_string,$filter_map,$have_content) {
      if ($have_content($elt)) {
        $aa = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -922783157, 175), $x);
        };
        $name = $caml_js_to_string(
          (function(dynamic $t16, dynamic $param) {return $t16->name;})($elt, $aa)
        );
        $ab = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 445440528, 176), $x);
        };
        if (
          (int)
          (function(dynamic $t15, dynamic $param) {return $t15->multiple;})($elt, $ab)
        ) {
          $ac = function(dynamic $i) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$elt) {
            $am = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -977287917, 177), $x);
            };
            $an = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -536988834, 178), $x);
            };
            $ao = (function(dynamic $t12, dynamic $param) {return $t12->options;
             })($elt, $an);
            $ap = (function(dynamic $t14, dynamic $t13, dynamic $param) {return $t14->item($t13);
             })($ao, $i, $am);
            return $call1($Js_of_ocaml_Js[5][10], $ap);
          };
          $ad = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 520590566, 179), $x);
          };
          $ae = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -536988834, 180), $x);
          };
          $af = (function(dynamic $t10, dynamic $param) {return $t10->options;
           })($elt, $ae);
          $ag = (function(dynamic $t11, dynamic $param) {return $t11->length;})($af, $ad);
          $options = $call2($Array[2], $ag, $ac);
          $ah = $call1($Array[11], $options);
          return $filter_map->contents(
            function(dynamic $param) use ($call1,$caml_get_public_method,$name) {
              if ($param) {
                $e = $param[1];
                $ak = function(dynamic $x) use ($call1,$caml_get_public_method) {
                  return $call1(
                    $caml_get_public_method($x, 829237851, 181),
                    $x
                  );
                };
                if (
                  (int)
                  (function(dynamic $t9, dynamic $param) {return $t9->selected;
                   })($e, $ak)
                ) {
                  $al = function(dynamic $x) use ($call1,$caml_get_public_method) {
                    return $call1(
                      $caml_get_public_method($x, 834174833, 182),
                      $x
                    );
                  };
                  return Vector{
                    0,
                    Vector{
                      0,
                      $name,
                      Vector{
                        0,
                        -976970511,
                        (function(dynamic $t8, dynamic $param) {return $t8->value;})($e, $al)
                      }
                    }
                  };
                }
                return 0;
              }
              return 0;
            },
            $ah
          );
        }
        $ai = 0;
        $aj = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 834174833, 183), $x);
        };
        return Vector{
          0,
          Vector{
            0,
            $name,
            Vector{
              0,
              -976970511,
              (function(dynamic $t7, dynamic $param) {return $t7->value;})($elt, $aj)
            }
          },
          $ai
        };
      }
      return 0;
    };
    $get_input_val = function(dynamic $opt, dynamic $elt) use ($Array,$Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$caml_js_to_string,$caml_string_notequal,$cst_checkbox,$cst_file,$cst_password,$cst_radio,$cst_reset,$cst_submit,$cst_text,$filter_map,$have_content,$runtime) {
      if ($opt) {
        $sth = $opt[1];
        $get = $sth;
      }
      else {$get = 0;}
      if ($have_content($elt)) {
        $G = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -922783157, 184), $x);
        };
        $name = $caml_js_to_string(
          (function(dynamic $t29, dynamic $param) {return $t29->name;})($elt, $G)
        );
        $H = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 834174833, 185), $x);
        };
        $value = (function(dynamic $t28, dynamic $param) {return $t28->value;})($elt, $H);
        $I = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 946097238, 186), $x);
        };
        $J = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 1707673, 187), $x);
        };
        $K = (function(dynamic $t26, dynamic $param) {return $t26->type;})($elt, $J);
        $match = $runtime["caml_js_to_byte_string"](
          (function(dynamic $t27, dynamic $param) {return $t27->toLowerCase();
           })($K, $I)
        );
        if ($caml_string_notequal($match, $cst_checkbox)) {
          if (! $caml_string_notequal($match, $cst_file)) {
            if ($get) {
              return Vector{
                0,
                Vector{0, $name, Vector{0, -976970511, $value}},
                0
              };
            }
            $M = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, 10018423, 189), $x);
            };
            $N = (function(dynamic $t25, dynamic $param) {return $t25->files;})($elt, $M);
            $match__0 = $call1($Js_of_ocaml_Js[6][10], $N);
            if ($match__0) {
              $list = $match__0[1];
              $O = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, 520590566, 190), $x);
              };
              if (
                0 ===
                  (function(dynamic $t24, dynamic $param) {return $t24->length;
                   })($list, $O)
              ) {
                return Vector{
                  0,
                  Vector{0, $name, Vector{0, -976970511, ""}},
                  0
                };
              }
              $P = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, 445440528, 191), $x);
              };
              $Q = (function(dynamic $t23, dynamic $param) {return $t23->multiple;
               })($elt, $P);
              $match__1 = $call1($Js_of_ocaml_Js[6][10], $Q);
              if ($match__1) {
                if (0 !== $match__1[1]) {
                  $U = function(dynamic $i) use ($call1,$caml_get_public_method,$list) {
                    $Z = function(dynamic $x) use ($call1,$caml_get_public_method) {
                      return $call1(
                        $caml_get_public_method($x, -977287917, 193),
                        $x
                      );
                    };
                    return (function(dynamic $t22, dynamic $t21, dynamic $param) {return $t22->item($t21);
                     })($list, $i, $Z);
                  };
                  $V = function(dynamic $x) use ($call1,$caml_get_public_method) {
                    return $call1(
                      $caml_get_public_method($x, 520590566, 194),
                      $x
                    );
                  };
                  $W = (function(dynamic $t20, dynamic $param) {return $t20->length;
                   })($list, $V);
                  $X = $call2($Array[2], $W, $U);
                  $Y = $call1($Array[11], $X);
                  return $filter_map->contents(
                    function(dynamic $f) use ($Js_of_ocaml_Js,$call1,$name) {
                      $match = $call1($Js_of_ocaml_Js[5][10], $f);
                      if ($match) {
                        $file = $match[1];
                        return Vector{
                          0,
                          Vector{0, $name, Vector{0, 781515420, $file}}
                        };
                      }
                      return 0;
                    },
                    $Y
                  );
                }
              }
              $R = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -977287917, 192), $x
                );
              };
              $S = 0;
              $T = (function(dynamic $t19, dynamic $t18, dynamic $param) {return $t19->item($t18);
               })($list, $S, $R);
              $match__2 = $call1($Js_of_ocaml_Js[5][10], $T);
              if ($match__2) {
                $file = $match__2[1];
                return Vector{
                  0,
                  Vector{0, $name, Vector{0, 781515420, $file}},
                  0
                };
              }
              return 0;
            }
            return 0;
          }
          if ($caml_string_notequal($match, $cst_password)) {
            if ($caml_string_notequal($match, $cst_radio)) {
              if ($caml_string_notequal($match, $cst_reset)) {
                if ($caml_string_notequal($match, $cst_submit)) {
                  if ($caml_string_notequal($match, $cst_text)) {
                    return Vector{
                      0,
                      Vector{0, $name, Vector{0, -976970511, $value}},
                      0
                    };
                  }
                  $switch__0 = 1;
                  $switch__1 = 0;
                }
                else {$switch__1 = 1;}
              }
              else {$switch__1 = 1;}
              if ($switch__1) {return 0;}
            }
            else {$switch__0 = 0;}
          }
          else {$switch__0 = 1;}
          if ($switch__0) {
            return Vector{
              0,
              Vector{0, $name, Vector{0, -976970511, $value}},
              0
            };
          }
        }
        $L = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 321172263, 188), $x);
        };
        return (int)
         (function(dynamic $t17, dynamic $param) {return $t17->checked;})($elt, $L)
          ? Vector{0, Vector{0, $name, Vector{0, -976970511, $value}}, 0}
          : (0);
      }
      return 0;
    };
    $form_elements = function(dynamic $get, dynamic $form) use ($Array,$Js_of_ocaml_Dom_html,$Js_of_ocaml_Js,$List,$call1,$call2,$caml_get_public_method,$get_input_val,$get_select_val,$get_textarea_val) {
      $v = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 195), $x);
      };
      $w = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 63190583, 196), $x);
      };
      $x = (function(dynamic $t33, dynamic $param) {return $t33->elements;})($form, $w);
      $length = (function(dynamic $t34, dynamic $param) {return $t34->length;})($x, $v);
      $y = function(dynamic $i) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$form) {
        $C = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -977287917, 197), $x);
        };
        $D = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 63190583, 198), $x);
        };
        $E = (function(dynamic $t30, dynamic $param) {return $t30->elements;})($form, $D);
        $F = (function(dynamic $t32, dynamic $t31, dynamic $param) {return $t32->item($t31);
         })($E, $i, $C);
        return $call1($Js_of_ocaml_Js[5][10], $F);
      };
      $z = $call2($Array[2], $length, $y);
      $elements = $call1($Array[11], $z);
      $A = function(dynamic $param) use ($Js_of_ocaml_Dom_html,$call1,$get,$get_input_val,$get_select_val,$get_textarea_val) {
        if ($param) {
          $v = $param[1];
          $match = $call1($Js_of_ocaml_Dom_html[109], $v);
          switch($match[0]) {
            // FALLTHROUGH
            case 31:
              $v__0 = $match[1];
              return $get_input_val($get, $v__0);
            // FALLTHROUGH
            case 48:
              $v__1 = $match[1];
              return $get_select_val($v__1);
            // FALLTHROUGH
            case 53:
              $v__2 = $match[1];
              return $get_textarea_val($v__2);
            // FALLTHROUGH
            default:
              return 0;
            }
        }
        return 0;
      };
      $B = $call2($List[17], $A, $elements);
      $contents = $call1($List[14], $B);
      return $contents;
    };
    $append = function(dynamic $form_contents, dynamic $form_elt) use ($call1,$caml_get_public_method) {
      if (891486873 <= $form_contents[1]) {
        $list = $form_contents[2];
        $list[1] = Vector{0, $form_elt, $list[1]};
        return 0;
      }
      $f = $form_contents[2];
      $p = $form_elt[2];
      $q = $form_elt[1];
      if (781515420 <= $p[1]) {
        $file = $p[2];
        $r = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 494108962, 199), $x);
        };
        $s = $q->toString();
        return (function
         (dynamic $t40, dynamic $t38, dynamic $t39, dynamic $param) {return $t40->append($t38, $t39);
         })($f, $s, $file, $r);
      }
      $s__0 = $p[2];
      $t = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 265544154, 200), $x);
      };
      $u = $q->toString();
      return (function
       (dynamic $t37, dynamic $t35, dynamic $t36, dynamic $param) {return $t37->append($t35, $t36);
       })($f, $u, $s__0, $t);
    };
    $empty_form_contents = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$formData) {
      $n = $call1($Js_of_ocaml_Js[4], $formData);
      $match = $call1($Js_of_ocaml_Js[6][10], $n);
      if ($match) {
        $constr = $match[1];
        $o = 0;
        return Vector{
          0,
          808620462,
          (function(dynamic $t41, dynamic $param) {return new $t41();})($constr, $o)
        };
      }
      return Vector{0, 891486873, Vector{0, 0}};
    };
    $post_form_contents = function(dynamic $form) use ($List,$append,$call2,$empty_form_contents,$form_elements) {
      $contents = $empty_form_contents(0);
      $k = $form_elements(0, $form);
      $l = function(dynamic $m) use ($append,$contents) {
        return $append($contents, $m);
      };
      $call2($List[15], $l, $k);
      return $contents;
    };
    $get_form_contents = function(dynamic $form) use ($Assert_failure,$List,$call2,$caml_js_to_string,$e,$f,$form_elements,$is_int,$runtime) {
      $g = $form_elements($e, $form);
      $h = function(dynamic $param) use ($Assert_failure,$caml_js_to_string,$f,$is_int,$runtime) {
        $i = $param[2];
        $j = $param[1];
        if (! $is_int($i)) {
          if (-976970511 === $i[1]) {
            $s = $i[2];
            return Vector{0, $j, $caml_js_to_string($s)};
          }
        }
        throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $f}) as \Throwable;
      };
      return $call2($List[17], $h, $g);
    };
    $Js_of_ocaml_Form = Vector{
      0,
      $formData,
      $formData_form,
      $append,
      $post_form_contents,
      $get_form_contents,
      $empty_form_contents,
      $form_elements
    };
    
    $runtime["caml_register_global"](
      48,
      $Js_of_ocaml_Form,
      "Js_of_ocaml__Form"
    );

  }
}

