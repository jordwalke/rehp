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
    $lq = Vector{0, $string("lib/js_of_ocaml/form.ml"), 170, 58};
    $lp = Vector{0, 1};
    $ll = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -137852659, 202), $x);
    };
    $lm = $Js_of_ocaml_Js[50][1];
    $formData = (function(dynamic $t0, dynamic $param) {return $t0->FormData;})($lm, $ll);
    $ln = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -137852659, 203), $x);
    };
    $lo = $Js_of_ocaml_Js[50][1];
    $formData_form = (function(dynamic $t1, dynamic $param) {return $t1->FormData;
     })($lo, $ln);
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
      $mt = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 204), $x);
      };
      $mu = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -922783157, 205), $x);
      };
      $mv = (function(dynamic $t2, dynamic $param) {return $t2->name;})($elt, $mu);
      $mw = 0 <
         (function(dynamic $t3, dynamic $param) {return $t3->length;})($mv, $mt)
        ? 1
        : (0);
      if ($mw) {
        $mx = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -66829956, 206), $x);
        };
        $my = 1 -
          (int)
          (function(dynamic $t4, dynamic $param) {return $t4->disabled;})($elt, $mx);
      }
      else {$my = $mw;}
      return $my;
    };
    $get_textarea_val = function(dynamic $elt) use ($call1,$caml_get_public_method,$caml_js_to_string,$have_content) {
      if ($have_content($elt)) {
        $mq = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -922783157, 207), $x);
        };
        $name = $caml_js_to_string(
          (function(dynamic $t6, dynamic $param) {return $t6->name;})($elt, $mq)
        );
        $mr = 0;
        $ms = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 834174833, 208), $x);
        };
        return Vector{
          0,
          Vector{
            0,
            $name,
            Vector{
              0,
              -976970511,
              (function(dynamic $t5, dynamic $param) {return $t5->value;})($elt, $ms)
            }
          },
          $mr
        };
      }
      return 0;
    };
    $get_select_val = function(dynamic $elt) use ($Array,$Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$caml_js_to_string,$filter_map,$have_content) {
      if ($have_content($elt)) {
        $ma = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -922783157, 209), $x);
        };
        $name = $caml_js_to_string(
          (function(dynamic $t16, dynamic $param) {return $t16->name;})($elt, $ma)
        );
        $mb = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 445440528, 210), $x);
        };
        if (
          (int)
          (function(dynamic $t15, dynamic $param) {return $t15->multiple;})($elt, $mb)
        ) {
          $mc = function(dynamic $i) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$elt) {
            $mm = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -977287917, 211), $x);
            };
            $mn = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -536988834, 212), $x);
            };
            $mo = (function(dynamic $t12, dynamic $param) {return $t12->options;
             })($elt, $mn);
            $mp = (function(dynamic $t14, dynamic $t13, dynamic $param) {return $t14->item($t13);
             })($mo, $i, $mm);
            return $call1($Js_of_ocaml_Js[5][10], $mp);
          };
          $md = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 520590566, 213), $x);
          };
          $me = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -536988834, 214), $x);
          };
          $mf = (function(dynamic $t10, dynamic $param) {return $t10->options;
           })($elt, $me);
          $mg = (function(dynamic $t11, dynamic $param) {return $t11->length;})($mf, $md);
          $options = $call2($Array[2], $mg, $mc);
          $mh = $call1($Array[11], $options);
          return $filter_map->contents(
            function(dynamic $param) use ($call1,$caml_get_public_method,$name) {
              if ($param) {
                $e = $param[1];
                $mk = function(dynamic $x) use ($call1,$caml_get_public_method) {
                  return $call1(
                    $caml_get_public_method($x, 829237851, 215),
                    $x
                  );
                };
                if (
                  (int)
                  (function(dynamic $t9, dynamic $param) {return $t9->selected;
                   })($e, $mk)
                ) {
                  $ml = function(dynamic $x) use ($call1,$caml_get_public_method) {
                    return $call1(
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
                        (function(dynamic $t8, dynamic $param) {return $t8->value;})($e, $ml)
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
        $mj = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 834174833, 217), $x);
        };
        return Vector{
          0,
          Vector{
            0,
            $name,
            Vector{
              0,
              -976970511,
              (function(dynamic $t7, dynamic $param) {return $t7->value;})($elt, $mj)
            }
          },
          $mi
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
        $lR = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -922783157, 218), $x);
        };
        $name = $caml_js_to_string(
          (function(dynamic $t29, dynamic $param) {return $t29->name;})($elt, $lR)
        );
        $lS = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 834174833, 219), $x);
        };
        $value = (function(dynamic $t28, dynamic $param) {return $t28->value;})($elt, $lS);
        $lT = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 946097238, 220), $x);
        };
        $lU = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 1707673, 221), $x);
        };
        $lV = (function(dynamic $t26, dynamic $param) {return $t26->type;})($elt, $lU);
        $match = $runtime["caml_js_to_byte_string"](
          (function(dynamic $t27, dynamic $param) {return $t27->toLowerCase();
           })($lV, $lT)
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
            $lX = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, 10018423, 223), $x);
            };
            $lY = (function(dynamic $t25, dynamic $param) {return $t25->files;
             })($elt, $lX);
            $match__0 = $call1($Js_of_ocaml_Js[6][10], $lY);
            if ($match__0) {
              $list = $match__0[1];
              $lZ = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, 520590566, 224), $x);
              };
              if (
                0 ===
                  (function(dynamic $t24, dynamic $param) {return $t24->length;
                   })($list, $lZ)
              ) {
                return Vector{
                  0,
                  Vector{0, $name, Vector{0, -976970511, ""}},
                  0
                };
              }
              $l0 = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, 445440528, 225), $x);
              };
              $l1 = (function(dynamic $t23, dynamic $param) {return $t23->multiple;
               })($elt, $l0);
              $match__1 = $call1($Js_of_ocaml_Js[6][10], $l1);
              if ($match__1) {
                if (0 !== $match__1[1]) {
                  $l5 = function(dynamic $i) use ($call1,$caml_get_public_method,$list) {
                    $l_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
                      return $call1(
                        $caml_get_public_method($x, -977287917, 227),
                        $x
                      );
                    };
                    return (function(dynamic $t22, dynamic $t21, dynamic $param) {return $t22->item($t21);
                     })($list, $i, $l_);
                  };
                  $l6 = function(dynamic $x) use ($call1,$caml_get_public_method) {
                    return $call1(
                      $caml_get_public_method($x, 520590566, 228),
                      $x
                    );
                  };
                  $l7 = (function(dynamic $t20, dynamic $param) {return $t20->length;
                   })($list, $l6);
                  $l8 = $call2($Array[2], $l7, $l5);
                  $l9 = $call1($Array[11], $l8);
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
                    $l9
                  );
                }
              }
              $l2 = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -977287917, 226), $x
                );
              };
              $l3 = 0;
              $l4 = (function(dynamic $t19, dynamic $t18, dynamic $param) {return $t19->item($t18);
               })($list, $l3, $l2);
              $match__2 = $call1($Js_of_ocaml_Js[5][10], $l4);
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
        $lW = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 321172263, 222), $x);
        };
        return (int)
         (function(dynamic $t17, dynamic $param) {return $t17->checked;})($elt, $lW)
          ? Vector{0, Vector{0, $name, Vector{0, -976970511, $value}}, 0}
          : (0);
      }
      return 0;
    };
    $form_elements = function(dynamic $get, dynamic $form) use ($Array,$Js_of_ocaml_Dom_html,$Js_of_ocaml_Js,$List,$call1,$call2,$caml_get_public_method,$get_input_val,$get_select_val,$get_textarea_val) {
      $lG = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 229), $x);
      };
      $lH = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 63190583, 230), $x);
      };
      $lI = (function(dynamic $t33, dynamic $param) {return $t33->elements;})($form, $lH);
      $length = (function(dynamic $t34, dynamic $param) {return $t34->length;})($lI, $lG);
      $lJ = function(dynamic $i) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$form) {
        $lN = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -977287917, 231), $x);
        };
        $lO = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 63190583, 232), $x);
        };
        $lP = (function(dynamic $t30, dynamic $param) {return $t30->elements;})($form, $lO);
        $lQ = (function(dynamic $t32, dynamic $t31, dynamic $param) {return $t32->item($t31);
         })($lP, $i, $lN);
        return $call1($Js_of_ocaml_Js[5][10], $lQ);
      };
      $lK = $call2($Array[2], $length, $lJ);
      $elements = $call1($Array[11], $lK);
      $lL = function(dynamic $param) use ($Js_of_ocaml_Dom_html,$call1,$get,$get_input_val,$get_select_val,$get_textarea_val) {
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
      $lM = $call2($List[17], $lL, $elements);
      $contents = $call1($List[14], $lM);
      return $contents;
    };
    $append = function(dynamic $form_contents, dynamic $form_elt) use ($call1,$caml_get_public_method) {
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
        $lC = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 494108962, 233), $x);
        };
        $lD = $lB->toString();
        return (function
         (dynamic $t40, dynamic $t38, dynamic $t39, dynamic $param) {return $t40->append($t38, $t39);
         })($f, $lD, $file, $lC);
      }
      $s = $lA[2];
      $lE = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 265544154, 234), $x);
      };
      $lF = $lB->toString();
      return (function
       (dynamic $t37, dynamic $t35, dynamic $t36, dynamic $param) {return $t37->append($t35, $t36);
       })($f, $lF, $s, $lE);
    };
    $empty_form_contents = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$formData) {
      $ly = $call1($Js_of_ocaml_Js[4], $formData);
      $match = $call1($Js_of_ocaml_Js[6][10], $ly);
      if ($match) {
        $constr = $match[1];
        $lz = 0;
        return Vector{
          0,
          808620462,
          (function(dynamic $t41, dynamic $param) {return new $t41();})($constr, $lz)
        };
      }
      return Vector{0, 891486873, Vector{0, 0}};
    };
    $post_form_contents = function(dynamic $form) use ($List,$append,$call2,$empty_form_contents,$form_elements) {
      $contents = $empty_form_contents(0);
      $lv = $form_elements(0, $form);
      $lw = function(dynamic $lx) use ($append,$contents) {
        return $append($contents, $lx);
      };
      $call2($List[15], $lw, $lv);
      return $contents;
    };
    $get_form_contents = function(dynamic $form) use ($Assert_failure,$List,$call2,$caml_js_to_string,$form_elements,$is_int,$lp,$lq,$runtime) {
      $lr = $form_elements($lp, $form);
      $ls = function(dynamic $param) use ($Assert_failure,$caml_js_to_string,$is_int,$lq,$runtime) {
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
      return $call2($List[17], $ls, $lr);
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