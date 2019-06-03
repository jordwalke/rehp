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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $is_int = $runtime["is_int"];
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
    $cst_checkbox = $caml_new_string("checkbox");
    $cst_file = $caml_new_string("file");
    $cst_password = $caml_new_string("password");
    $cst_radio = $caml_new_string("radio");
    $cst_reset = $caml_new_string("reset");
    $cst_submit = $caml_new_string("submit");
    $cst_text = $caml_new_string("text");
    $Assert_failure = $global_data["Assert_failure"];
    $List = $global_data["List_"];
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Js_of_ocaml_Dom_html = $global_data["Js_of_ocaml__Dom_html"];
    $Array = $global_data["Array_"];
    $lq = Vector{0, $caml_new_string("lib/js_of_ocaml/form.ml"), 170, 58};
    $lp = Vector{0, 1};
    $ll = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -137852659, 202), $x);
    };
    $lm = $Js_of_ocaml_Js[50][1];
    $formData = (function($t0, $param) {return $t0->FormData;})($lm, $ll);
    $ln = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -137852659, 203), $x);
    };
    $lo = $Js_of_ocaml_Js[50][1];
    $formData_form = (function($t1, $param) {return $t1->FormData;})($lo, $ln);
    $filter_map->contents = function($f, $param) use ($caml_call1,$filter_map) {
      $param__0 = $param;
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
    $have_content = function($elt) use ($caml_call1,$caml_get_public_method) {
      $mt = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 520590566, 204), $x);
      };
      $mu = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -922783157, 205), $x);
      };
      $mv = (function($t2, $param) {return $t2->name;})($elt, $mu);
      $mw = 0 < (function($t3, $param) {return $t3->length;})($mv, $mt)
        ? 1
        : (0);
      if ($mw) {
        $mx = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -66829956, 206), $x);
        };
        $my = 1 -
          (int)
          (function($t4, $param) {return $t4->disabled;})($elt, $mx);
      }
      else {$my = $mw;}
      return $my;
    };
    $get_textarea_val = function($elt) use ($caml_call1,$caml_get_public_method,$caml_js_to_string,$have_content) {
      if ($have_content($elt)) {
        $mq = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -922783157, 207), $x);
        };
        $name = $caml_js_to_string(
          (function($t6, $param) {return $t6->name;})($elt, $mq)
        );
        $mr = 0;
        $ms = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 834174833, 208), $x);
        };
        return Vector{
          0,
          Vector{
            0,
            $name,
            Vector{
              0,
              -976970511,
              (function($t5, $param) {return $t5->value;})($elt, $ms)
            }
          },
          $mr
        };
      }
      return 0;
    };
    $get_select_val = function($elt) use ($Array,$Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_get_public_method,$caml_js_to_string,$filter_map,$have_content) {
      if ($have_content($elt)) {
        $ma = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -922783157, 209), $x);
        };
        $name = $caml_js_to_string(
          (function($t16, $param) {return $t16->name;})($elt, $ma)
        );
        $mb = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 445440528, 210), $x);
        };
        if ((int) (function($t15, $param) {return $t15->multiple;})($elt, $mb)
        ) {
          $mc = function($i) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$elt) {
            $mm = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, -977287917, 211),
                $x
              );
            };
            $mn = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, -536988834, 212),
                $x
              );
            };
            $mo = (function($t12, $param) {return $t12->options;})($elt, $mn);
            $mp = (function($t14, $t13, $param) {return $t14->item($t13);})($mo, $i, $mm);
            return $caml_call1($Js_of_ocaml_Js[5][10], $mp);
          };
          $md = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 520590566, 213), $x
            );
          };
          $me = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -536988834, 214),
              $x
            );
          };
          $mf = (function($t10, $param) {return $t10->options;})($elt, $me);
          $mg = (function($t11, $param) {return $t11->length;})($mf, $md);
          $options = $caml_call2($Array[2], $mg, $mc);
          $mh = $caml_call1($Array[11], $options);
          return $filter_map->contents(
            function($param) use ($caml_call1,$caml_get_public_method,$name) {
              if ($param) {
                $e = $param[1];
                $mk = function($x) use ($caml_call1,$caml_get_public_method) {
                  return $caml_call1(
                    $caml_get_public_method($x, 829237851, 215),
                    $x
                  );
                };
                if (
                  (int)
                  (function($t9, $param) {return $t9->selected;})($e, $mk)
                ) {
                  $ml = function($x) use ($caml_call1,$caml_get_public_method) {
                    return $caml_call1(
                      $caml_get_public_method($x, 834174833, 216),
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
                        (function($t8, $param) {return $t8->value;})($e, $ml)
                      }
                    }
                  };
                }
                return 0;
              }
              return 0;
            },
            $mh
          );
        }
        $mi = 0;
        $mj = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 834174833, 217), $x);
        };
        return Vector{
          0,
          Vector{
            0,
            $name,
            Vector{
              0,
              -976970511,
              (function($t7, $param) {return $t7->value;})($elt, $mj)
            }
          },
          $mi
        };
      }
      return 0;
    };
    $get_input_val = function($opt, $elt) use ($Array,$Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_get_public_method,$caml_js_to_string,$caml_string_notequal,$cst_checkbox,$cst_file,$cst_password,$cst_radio,$cst_reset,$cst_submit,$cst_text,$filter_map,$have_content,$runtime) {
      if ($opt) {
        $sth = $opt[1];
        $get = $sth;
      }
      else {$get = 0;}
      if ($have_content($elt)) {
        $lR = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -922783157, 218), $x);
        };
        $name = $caml_js_to_string(
          (function($t29, $param) {return $t29->name;})($elt, $lR)
        );
        $lS = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 834174833, 219), $x);
        };
        $value = (function($t28, $param) {return $t28->value;})($elt, $lS);
        $lT = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 946097238, 220), $x);
        };
        $lU = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 1707673, 221), $x);
        };
        $lV = (function($t26, $param) {return $t26->type;})($elt, $lU);
        $match = $runtime["caml_js_to_byte_string"](
          (function($t27, $param) {return $t27->toLowerCase();})($lV, $lT)
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
            $lX = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, 10018423, 223),
                $x
              );
            };
            $lY = (function($t25, $param) {return $t25->files;})($elt, $lX);
            $match__0 = $caml_call1($Js_of_ocaml_Js[6][10], $lY);
            if ($match__0) {
              $list = $match__0[1];
              $lZ = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, 520590566, 224),
                  $x
                );
              };
              if (
                0 ===
                  (function($t24, $param) {return $t24->length;})($list, $lZ)
              ) {
                return Vector{
                  0,
                  Vector{0, $name, Vector{0, -976970511, ""}},
                  0
                };
              }
              $l0 = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, 445440528, 225),
                  $x
                );
              };
              $l1 = (function($t23, $param) {return $t23->multiple;})($elt, $l0);
              $match__1 = $caml_call1($Js_of_ocaml_Js[6][10], $l1);
              if ($match__1) {
                if (0 !== $match__1[1]) {
                  $l5 = function($i) use ($caml_call1,$caml_get_public_method,$list) {
                    $l_ = function($x) use ($caml_call1,$caml_get_public_method) {
                      return $caml_call1(
                        $caml_get_public_method($x, -977287917, 227),
                        $x
                      );
                    };
                    return (function($t22, $t21, $param) {return $t22->item($t21);
                     })($list, $i, $l_);
                  };
                  $l6 = function($x) use ($caml_call1,$caml_get_public_method) {
                    return $caml_call1(
                      $caml_get_public_method($x, 520590566, 228),
                      $x
                    );
                  };
                  $l7 = (function($t20, $param) {return $t20->length;})($list, $l6);
                  $l8 = $caml_call2($Array[2], $l7, $l5);
                  $l9 = $caml_call1($Array[11], $l8);
                  return $filter_map->contents(
                    function($f) use ($Js_of_ocaml_Js,$caml_call1,$name) {
                      $match = $caml_call1($Js_of_ocaml_Js[5][10], $f);
                      if ($match) {
                        $file = $match[1];
                        return Vector{
                          0,
                          Vector{0, $name, Vector{0, 781515420, $file}}
                        };
                      }
                      return 0;
                    },
                    $l9
                  );
                }
              }
              $l2 = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, -977287917, 226),
                  $x
                );
              };
              $l3 = 0;
              $l4 = (function($t19, $t18, $param) {return $t19->item($t18);})($list, $l3, $l2);
              $match__2 = $caml_call1($Js_of_ocaml_Js[5][10], $l4);
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
        $lW = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 321172263, 222), $x);
        };
        return (int)
         (function($t17, $param) {return $t17->checked;})($elt, $lW)
          ? Vector{0, Vector{0, $name, Vector{0, -976970511, $value}}, 0}
          : (0);
      }
      return 0;
    };
    $form_elements = function($get, $form) use ($Array,$Js_of_ocaml_Dom_html,$Js_of_ocaml_Js,$List,$caml_call1,$caml_call2,$caml_get_public_method,$get_input_val,$get_select_val,$get_textarea_val) {
      $lG = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 520590566, 229), $x);
      };
      $lH = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 63190583, 230), $x);
      };
      $lI = (function($t33, $param) {return $t33->elements;})($form, $lH);
      $length = (function($t34, $param) {return $t34->length;})($lI, $lG);
      $lJ = function($i) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$form) {
        $lN = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -977287917, 231), $x);
        };
        $lO = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 63190583, 232), $x);
        };
        $lP = (function($t30, $param) {return $t30->elements;})($form, $lO);
        $lQ = (function($t32, $t31, $param) {return $t32->item($t31);})($lP, $i, $lN);
        return $caml_call1($Js_of_ocaml_Js[5][10], $lQ);
      };
      $lK = $caml_call2($Array[2], $length, $lJ);
      $elements = $caml_call1($Array[11], $lK);
      $lL = function($param) use ($Js_of_ocaml_Dom_html,$caml_call1,$get,$get_input_val,$get_select_val,$get_textarea_val) {
        if ($param) {
          $v = $param[1];
          $match = $caml_call1($Js_of_ocaml_Dom_html[109], $v);
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
      $lM = $caml_call2($List[17], $lL, $elements);
      $contents = $caml_call1($List[14], $lM);
      return $contents;
    };
    $append = function($form_contents, $form_elt) use ($caml_call1,$caml_get_public_method) {
      if (891486873 <= $form_contents[1]) {
        $list = $form_contents[2];
        $list[1] = Vector{0, $form_elt, $list[1]};
        return 0;
      }
      $f = $form_contents[2];
      $lA = $form_elt[2];
      $lB = $form_elt[1];
      if (781515420 <= $lA[1]) {
        $file = $lA[2];
        $lC = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 494108962, 233), $x);
        };
        $lD = $lB->toString();
        return (function($t40, $t38, $t39, $param) {return $t40->append($t38, $t39);
         })($f, $lD, $file, $lC);
      }
      $s = $lA[2];
      $lE = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 265544154, 234), $x);
      };
      $lF = $lB->toString();
      return (function($t37, $t35, $t36, $param) {return $t37->append($t35, $t36);
       })($f, $lF, $s, $lE);
    };
    $empty_form_contents = function($param) use ($Js_of_ocaml_Js,$caml_call1,$formData) {
      $ly = $caml_call1($Js_of_ocaml_Js[4], $formData);
      $match = $caml_call1($Js_of_ocaml_Js[6][10], $ly);
      if ($match) {
        $constr = $match[1];
        $lz = 0;
        return Vector{
          0,
          808620462,
          (function($t41, $param) {return new $t41();})($constr, $lz)
        };
      }
      return Vector{0, 891486873, Vector{0, 0}};
    };
    $post_form_contents = function($form) use ($List,$append,$caml_call2,$empty_form_contents,$form_elements) {
      $contents = $empty_form_contents(0);
      $lv = $form_elements(0, $form);
      $lw = function($lx) use ($append,$contents) {
        return $append($contents, $lx);
      };
      $caml_call2($List[15], $lw, $lv);
      return $contents;
    };
    $get_form_contents = function($form) use ($Assert_failure,$List,$caml_call2,$caml_js_to_string,$form_elements,$is_int,$lp,$lq,$runtime) {
      $lr = $form_elements($lp, $form);
      $ls = function($param) use ($Assert_failure,$caml_js_to_string,$is_int,$lq,$runtime) {
        $lt = $param[2];
        $lu = $param[1];
        if (! $is_int($lt)) {
          if (-976970511 === $lt[1]) {
            $s = $lt[2];
            return Vector{0, $lu, $caml_js_to_string($s)};
          }
        }
        throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $lq}) as \Throwable;
      };
      return $caml_call2($List[17], $ls, $lr);
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