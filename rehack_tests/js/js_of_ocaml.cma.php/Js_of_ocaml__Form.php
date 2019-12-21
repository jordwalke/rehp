<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Form {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $filter_map = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $string = $runtime["caml_new_string"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $is_int = $runtime["is_int"];
    $cst_checkbox = $string("checkbox");
    $cst_file = $string("file");
    $cst_password = $string("password");
    $cst_radio = $string("radio");
    $cst_reset = $string("reset");
    $cst_submit = $string("submit");
    $cst_text = $string("text");
    $Assert_failure =  Assert_failure::get ();
    $List =  List_::get ();
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Js_of_ocaml_Dom_html =  Js_of_ocaml__Dom_html::get ();
    $Array =  Array_::get ();
    $f_ = Vector{0, $string("lib/js_of_ocaml/form.ml"), 170, 58};
    $e_ = Vector{0, 1};
    $a_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -137852659, 168), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $formData = ((dynamic $t0, dynamic $param) ==> {return $t0->FormData;})($b_, $a_);
    $c_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -137852659, 169), $x);
    };
    $d_ = $Js_of_ocaml_Js[50][1];
    $formData_form = ((dynamic $t1, dynamic $param) ==> {return $t1->FormData;
     })($d_, $c_);
    $filter_map->contents = (dynamic $f, dynamic $param) ==> {
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
    $have_content = (dynamic $elt) ==> {
      $at_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 520590566, 170), $x);
      };
      $au_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -922783157, 171), $x);
      };
      $av_ = ((dynamic $t2, dynamic $param) ==> {return $t2->name;})($elt, $au_);
      $aw_ = 0 <
         ((dynamic $t3, dynamic $param) ==> {return $t3->length;})($av_, $at_)
        ? 1
        : (0);
      if ($aw_) {
        $ax_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -66829956, 172), $x);
        };
        $ay_ = 1 -
          (int)
          ((dynamic $t4, dynamic $param) ==> {return $t4->disabled;})($elt, $ax_);
      }
      else {$ay_ = $aw_;}
      return $ay_;
    };
    $get_textarea_val = (dynamic $elt) ==> {
      if ($have_content($elt)) {
        $aq_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -922783157, 173), $x);
        };
        $name = $caml_js_to_string(
          ((dynamic $t6, dynamic $param) ==> {return $t6->name;})($elt, $aq_)
        );
        $ar_ = 0;
        $as_ = (dynamic $x) ==> {
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
              ((dynamic $t5, dynamic $param) ==> {return $t5->value;})($elt, $as_)
            }
          },
          $ar_
        };
      }
      return 0;
    };
    $get_select_val = (dynamic $elt) ==> {
      if ($have_content($elt)) {
        $aa_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -922783157, 175), $x);
        };
        $name = $caml_js_to_string(
          ((dynamic $t16, dynamic $param) ==> {return $t16->name;})($elt, $aa_)
        );
        $ab_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 445440528, 176), $x);
        };
        if (
          (int)
          ((dynamic $t15, dynamic $param) ==> {return $t15->multiple;})($elt, $ab_)
        ) {
          $ac_ = (dynamic $i) ==> {
            $am_ = (dynamic $x) ==> {
              return $call1($caml_get_public_method($x, -977287917, 177), $x);
            };
            $an_ = (dynamic $x) ==> {
              return $call1($caml_get_public_method($x, -536988834, 178), $x);
            };
            $ao_ = ((dynamic $t12, dynamic $param) ==> {return $t12->options;})($elt, $an_);
            $ap_ = ((dynamic $t14, dynamic $t13, dynamic $param) ==> {return $t14->item($t13);
             })($ao_, $i, $am_);
            return $call1($Js_of_ocaml_Js[5][10], $ap_);
          };
          $ad_ = (dynamic $x) ==> {
            return $call1($caml_get_public_method($x, 520590566, 179), $x);
          };
          $ae_ = (dynamic $x) ==> {
            return $call1($caml_get_public_method($x, -536988834, 180), $x);
          };
          $af_ = ((dynamic $t10, dynamic $param) ==> {return $t10->options;})($elt, $ae_);
          $ag_ = ((dynamic $t11, dynamic $param) ==> {return $t11->length;})($af_, $ad_);
          $options = $call2($Array[2], $ag_, $ac_);
          $ah_ = $call1($Array[11], $options);
          return $filter_map->contents(
            (dynamic $param) ==> {
              if ($param) {
                $e = $param[1];
                $ak_ = (dynamic $x) ==> {
                  return $call1(
                    $caml_get_public_method($x, 829237851, 181),
                    $x
                  );
                };
                if (
                  (int)
                  ((dynamic $t9, dynamic $param) ==> {return $t9->selected;})($e, $ak_)
                ) {
                  $al_ = (dynamic $x) ==> {
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
                        ((dynamic $t8, dynamic $param) ==> {return $t8->value;})($e, $al_)
                      }
                    }
                  };
                }
                return 0;
              }
              return 0;
            },
            $ah_
          );
        }
        $ai_ = 0;
        $aj_ = (dynamic $x) ==> {
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
              ((dynamic $t7, dynamic $param) ==> {return $t7->value;})($elt, $aj_)
            }
          },
          $ai_
        };
      }
      return 0;
    };
    $get_input_val = (dynamic $opt, dynamic $elt) ==> {
      if ($opt) {
        $sth = $opt[1];
        $get = $sth;
      }
      else {$get = 0;}
      if ($have_content($elt)) {
        $G_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -922783157, 184), $x);
        };
        $name = $caml_js_to_string(
          ((dynamic $t29, dynamic $param) ==> {return $t29->name;})($elt, $G_)
        );
        $H_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 834174833, 185), $x);
        };
        $value = ((dynamic $t28, dynamic $param) ==> {return $t28->value;})($elt, $H_);
        $I_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 946097238, 186), $x);
        };
        $J_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 1707673, 187), $x);
        };
        $K_ = ((dynamic $t26, dynamic $param) ==> {return $t26->type;})($elt, $J_);
        $match = $runtime["caml_js_to_byte_string"](
          ((dynamic $t27, dynamic $param) ==> {return $t27->toLowerCase();})($K_, $I_)
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
            $M_ = (dynamic $x) ==> {
              return $call1($caml_get_public_method($x, 10018423, 189), $x);
            };
            $N_ = ((dynamic $t25, dynamic $param) ==> {return $t25->files;})($elt, $M_);
            $match__0 = $call1($Js_of_ocaml_Js[6][10], $N_);
            if ($match__0) {
              $list = $match__0[1];
              $O_ = (dynamic $x) ==> {
                return $call1($caml_get_public_method($x, 520590566, 190), $x);
              };
              if (
                0 ===
                  ((dynamic $t24, dynamic $param) ==> {return $t24->length;})($list, $O_)
              ) {
                return Vector{
                  0,
                  Vector{0, $name, Vector{0, -976970511, ""}},
                  0
                };
              }
              $P_ = (dynamic $x) ==> {
                return $call1($caml_get_public_method($x, 445440528, 191), $x);
              };
              $Q_ = ((dynamic $t23, dynamic $param) ==> {return $t23->multiple;
               })($elt, $P_);
              $match__1 = $call1($Js_of_ocaml_Js[6][10], $Q_);
              if ($match__1) {
                if (0 !== $match__1[1]) {
                  $U_ = (dynamic $i) ==> {
                    $Z_ = (dynamic $x) ==> {
                      return $call1(
                        $caml_get_public_method($x, -977287917, 193),
                        $x
                      );
                    };
                    return ((dynamic $t22, dynamic $t21, dynamic $param) ==> {return $t22->item($t21);
                     })($list, $i, $Z_);
                  };
                  $V_ = (dynamic $x) ==> {
                    return $call1(
                      $caml_get_public_method($x, 520590566, 194),
                      $x
                    );
                  };
                  $W_ = ((dynamic $t20, dynamic $param) ==> {return $t20->length;
                   })($list, $V_);
                  $X_ = $call2($Array[2], $W_, $U_);
                  $Y_ = $call1($Array[11], $X_);
                  return $filter_map->contents(
                    (dynamic $f) ==> {
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
                    $Y_
                  );
                }
              }
              $R_ = (dynamic $x) ==> {
                return $call1($caml_get_public_method($x, -977287917, 192), $x
                );
              };
              $S_ = 0;
              $T_ = ((dynamic $t19, dynamic $t18, dynamic $param) ==> {return $t19->item($t18);
               })($list, $S_, $R_);
              $match__2 = $call1($Js_of_ocaml_Js[5][10], $T_);
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
        $L_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 321172263, 188), $x);
        };
        return (int)
         ((dynamic $t17, dynamic $param) ==> {return $t17->checked;})($elt, $L_)
          ? Vector{0, Vector{0, $name, Vector{0, -976970511, $value}}, 0}
          : (0);
      }
      return 0;
    };
    $form_elements = (dynamic $get, dynamic $form) ==> {
      $v_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 520590566, 195), $x);
      };
      $w_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 63190583, 196), $x);
      };
      $x_ = ((dynamic $t33, dynamic $param) ==> {return $t33->elements;})($form, $w_);
      $length = ((dynamic $t34, dynamic $param) ==> {return $t34->length;})($x_, $v_);
      $y_ = (dynamic $i) ==> {
        $C_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -977287917, 197), $x);
        };
        $D_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 63190583, 198), $x);
        };
        $E_ = ((dynamic $t30, dynamic $param) ==> {return $t30->elements;})($form, $D_);
        $F_ = ((dynamic $t32, dynamic $t31, dynamic $param) ==> {return $t32->item($t31);
         })($E_, $i, $C_);
        return $call1($Js_of_ocaml_Js[5][10], $F_);
      };
      $z_ = $call2($Array[2], $length, $y_);
      $elements = $call1($Array[11], $z_);
      $A_ = (dynamic $param) ==> {
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
      $B_ = $call2($List[17], $A_, $elements);
      $contents = $call1($List[14], $B_);
      return $contents;
    };
    $append = (dynamic $form_contents, dynamic $form_elt) ==> {
      if (891486873 <= $form_contents[1]) {
        $list = $form_contents[2];
        $list[1] = Vector{0, $form_elt, $list[1]};
        return 0;
      }
      $f = $form_contents[2];
      $p_ = $form_elt[2];
      $q_ = $form_elt[1];
      if (781515420 <= $p_[1]) {
        $file = $p_[2];
        $r_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 494108962, 199), $x);
        };
        $s_ = $q_->toString();
        return ((dynamic $t40, dynamic $t38, dynamic $t39, dynamic $param) ==> {return $t40->append($t38, $t39);
         })($f, $s_, $file, $r_);
      }
      $s = $p_[2];
      $t_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 265544154, 200), $x);
      };
      $u_ = $q_->toString();
      return ((dynamic $t37, dynamic $t35, dynamic $t36, dynamic $param) ==> {return $t37->append($t35, $t36);
       })($f, $u_, $s, $t_);
    };
    $empty_form_contents = (dynamic $param) ==> {
      $n_ = $call1($Js_of_ocaml_Js[4], $formData);
      $match = $call1($Js_of_ocaml_Js[6][10], $n_);
      if ($match) {
        $constr = $match[1];
        $o_ = 0;
        return Vector{
          0,
          808620462,
          ((dynamic $t41, dynamic $param) ==> {return new $t41();})($constr, $o_)
        };
      }
      return Vector{0, 891486873, Vector{0, 0}};
    };
    $post_form_contents = (dynamic $form) ==> {
      $contents = $empty_form_contents(0);
      $k_ = $form_elements(0, $form);
      $l_ = (dynamic $m_) ==> {return $append($contents, $m_);};
      $call2($List[15], $l_, $k_);
      return $contents;
    };
    $get_form_contents = (dynamic $form) ==> {
      $g_ = $form_elements($e_, $form);
      $h_ = (dynamic $param) ==> {
        $i_ = $param[2];
        $j_ = $param[1];
        if (! $is_int($i_)) {
          if (-976970511 === $i_[1]) {
            $s = $i_[2];
            return Vector{0, $j_, $caml_js_to_string($s)};
          }
        }
        throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $f_}) as \Throwable;
      };
      return $call2($List[17], $h_, $g_);
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
    
     return ($Js_of_ocaml_Form);

  }
  public static function formData(): dynamic {
    return static::callRehackFunction(static::get()[1], varray[]);
  }
  public static function formData_form(): dynamic {
    return static::callRehackFunction(static::get()[2], varray[]);
  }
  public static function append(dynamic $form_contents, dynamic $form_elt): dynamic {
    return static::callRehackFunction(static::get()[3], varray[$form_contents, $form_elt]);
  }
  public static function post_form_contents(dynamic $form): dynamic {
    return static::callRehackFunction(static::get()[4], varray[$form]);
  }
  public static function get_form_contents(dynamic $form): dynamic {
    return static::callRehackFunction(static::get()[5], varray[$form]);
  }
  public static function empty_form_contents(dynamic $param): dynamic {
    return static::callRehackFunction(static::get()[6], varray[$param]);
  }
  public static function form_elements(dynamic $get, dynamic $form): dynamic {
    return static::callRehackFunction(static::get()[7], varray[$get, $form]);
  }

}
/* Hashing disabled */
