<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Dom {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $Js_of_ocaml_Js = Js_of_ocaml__Js::get();
    $Assert_failure = Assert_failure::get();
    $Not_found = Not_found::get();
    $List = List_::get();
    $a_ = Vector{0, $string("lib/js_of_ocaml/dom.ml"), 343, 67} as dynamic;
    $list_of_nodeList = (dynamic $nodeList) ==> {
      $X_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 520590566, 24), $x);
      };
      $length = ((dynamic $t2, dynamic $param) ==> {return $t2->length;})($nodeList, $X_);
      $add_item = (dynamic $acc, dynamic $i) ==> {
        $acc__0 = $acc;
        $i__0 = $i;
        for (;;) {
          if ($i__0 < $length) {
            $Y_ = (dynamic $x) ==> {
              return $call1($caml_get_public_method($x, -977287917, 25), $x);
            };
            $Z_ = ((dynamic $t1, dynamic $t0, dynamic $param) ==> {return $t1->item($t0);
             })($nodeList, $i__0, $Y_);
            $match = $call1($Js_of_ocaml_Js[5][10], $Z_);
            if ($match) {
              $e = $match[1];
              $i__1 = (int) ($i__0 + 1) as dynamic;
              $acc__1 = Vector{0, $e, $acc__0} as dynamic;
              $acc__0 = $acc__1;
              $i__0 = $i__1;
              continue;
            }
            $i__2 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__2;
            continue;
          }
          return $call1($List[9], $acc__0);
        }
      };
      return $add_item(0, 0);
    };
    $disconnected = 1 as dynamic;
    $preceding = 2 as dynamic;
    $following = 4 as dynamic;
    $contains = 8 as dynamic;
    $contained_by = 16 as dynamic;
    $implementation_specific = 32 as dynamic;
    $has = (dynamic $t, dynamic $mask) ==> {
      return ($t & $mask) === $mask ? 1 : (0);
    };
    $add = (dynamic $x, dynamic $y) ==> {return $x | $y;};
    $DocumentPosition = Vector{
      0,
      $disconnected,
      $preceding,
      $following,
      $contains,
      $contained_by,
      $implementation_specific,
      $has,
      $add,
      $add
    } as dynamic;
    $appendChild = (dynamic $p, dynamic $n) ==> {
      $W_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 36716898, 26), $x);
      };
      (((dynamic $t4, dynamic $t3, dynamic $param) ==> {return $t4->appendChild($t3);
        })($p, $n, $W_));
      return 0;
    };
    $removeChild = (dynamic $p, dynamic $n) ==> {
      $V_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -1007843656, 27), $x);
      };
      (((dynamic $t6, dynamic $t5, dynamic $param) ==> {return $t6->removeChild($t5);
        })($p, $n, $V_));
      return 0;
    };
    $replaceChild = (dynamic $p, dynamic $n, dynamic $o) ==> {
      $U_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 961057992, 28), $x);
      };
      (((dynamic $t9, dynamic $t7, dynamic $t8, dynamic $param) ==> {return $t9->replaceChild($t7, $t8);
        })($p, $n, $o, $U_));
      return 0;
    };
    $insertBefore = (dynamic $p, dynamic $n, dynamic $o) ==> {
      $T_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 281001112, 29), $x);
      };
      (((dynamic $t12, dynamic $t10, dynamic $t11, dynamic $param) ==> {return $t12->insertBefore($t10, $t11);
        })($p, $n, $o, $T_));
      return 0;
    };
    $nodeType = (dynamic $e) ==> {
      $S_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -158969380, 30), $x);
      };
      $match = ((dynamic $t13, dynamic $param) ==> {return $t13->nodeType;})($e, $S_);
      if (0 !== $match) {
        $switcher = (int) ($match + -1) as dynamic;
        switch($switcher) {
          // FALLTHROUGH
          case 0:
            return Vector{0, $e};
          // FALLTHROUGH
          case 1:
            return Vector{1, $e};
          // FALLTHROUGH
          case 2:
          // FALLTHROUGH
          case 3:
            return Vector{2, $e};
          }
      }
      return Vector{3, $e};
    };
    $cast = (dynamic $e, dynamic $t) ==> {
      $R_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -158969380, 31), $x);
      };
      return ((dynamic $t14, dynamic $param) ==> {return $t14->nodeType;})($e, $R_) === $t
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $element = (dynamic $e) ==> {return $cast($e, 1);};
    $text = (dynamic $e) ==> {
      $P_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -158969380, 32), $x);
      };
      if (
        3 !==
          ((dynamic $t15, dynamic $param) ==> {return $t15->nodeType;})($e, $P_)
      ) {
        $Q_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -158969380, 33), $x);
        };
        if (
          4 !==
            ((dynamic $t16, dynamic $param) ==> {return $t16->nodeType;})($e, $Q_)
        ) {return $Js_of_ocaml_Js[1];}
      }
      return $call1($Js_of_ocaml_Js[2], $e);
    };
    $attr = (dynamic $e) ==> {return $cast($e, 2);};
    $no_handler = $Js_of_ocaml_Js[1];
    $window_event = (dynamic $param) ==> {return (event);};
    $handler = (dynamic $f) ==> {
      $L_ = (dynamic $e) ==> {
        $M_ = $call1($Js_of_ocaml_Js[2], $e);
        if ($call1($Js_of_ocaml_Js[5][5], $M_)) {
          $res = $call1($f, $e);
          if (1 - (int) $res) {
            $N_ = (dynamic $x) ==> {
              return $call1($caml_get_public_method($x, -408605495, 34), $x);
            };
            (((dynamic $t17, dynamic $param) ==> {
                return $t17->preventDefault();
              })($e, $N_));
          }
          return $res;
        }
        $e__0 = $window_event(0);
        $res__0 = $call1($f, $e__0);
        if (1 - (int) $res__0) {
          $O_ = (dynamic $x) ==> {
            return $call1($caml_get_public_method($x, 1049971873, 35), $x);
          };
          (((dynamic $t19, dynamic $t18, dynamic $param) ==> {$t19->returnValue = $t18;return 0;
            })($e__0, $res__0, $O_));
        }
        return $res__0;
      };
      return $call1($Js_of_ocaml_Js[2], $L_);
    };
    $full_handler = (dynamic $f) ==> {
      $H_ = $runtime["caml_js_wrap_meth_callback_unsafe"](
        (dynamic $this__0, dynamic $e) ==> {
          $I_ = $call1($Js_of_ocaml_Js[2], $e);
          if ($call1($Js_of_ocaml_Js[5][5], $I_)) {
            $res = $call2($f, $this__0, $e);
            if (1 - (int) $res) {
              $J_ = (dynamic $x) ==> {
                return $call1($caml_get_public_method($x, -408605495, 36), $x);
              };
              (((dynamic $t20, dynamic $param) ==> {
                  return $t20->preventDefault();
                })($e, $J_));
            }
            return $res;
          }
          $e__0 = $window_event(0);
          $res__0 = $call2($f, $this__0, $e__0);
          if (1 - (int) $res__0) {
            $K_ = (dynamic $x) ==> {
              return $call1($caml_get_public_method($x, 1049971873, 37), $x);
            };
            (((dynamic $t22, dynamic $t21, dynamic $param) ==> {$t22->returnValue = $t21;return 0;
              })($e__0, $res__0, $K_));
          }
          return $res__0;
        }
      );
      return $call1($Js_of_ocaml_Js[2], $H_);
    };
    $invoke_handler = (dynamic $f, dynamic $this__0, dynamic $event) ==> {return $f->call($this__0, $event);
    };
    $eventTarget = (dynamic $e) ==> {
      $v_ = (dynamic $param) ==> {
        $E_ = (dynamic $param) ==> {
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        };
        $F_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -1021537224, 38), $x);
        };
        $G_ = ((dynamic $t27, dynamic $param) ==> {return $t27->srcElement;})($e, $F_);
        return $call2($Js_of_ocaml_Js[5][8], $G_, $E_);
      };
      $w_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 116192081, 39), $x);
      };
      $x_ = ((dynamic $t26, dynamic $param) ==> {return $t26->target;})($e, $w_);
      $target = $call2($Js_of_ocaml_Js[5][8], $x_, $v_);
      $y_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -420195839, 40), $x);
      };
      $z_ = $Js_of_ocaml_Js[50][1];
      if (
        instance_of
         ($target,
          ((dynamic $t25, dynamic $param) ==> {return $t25->Node;})($z_, $y_))
      ) {
        $A_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -158969380, 41), $x);
        };
        if (
          3 ===
            ((dynamic $t24, dynamic $param) ==> {return $t24->nodeType;})($target, $A_)
        ) {
          $B_ = (dynamic $param) ==> {
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
          };
          $C_ = (dynamic $x) ==> {
            return $call1($caml_get_public_method($x, -400811956, 42), $x);
          };
          $D_ = ((dynamic $t23, dynamic $param) ==> {return $t23->parentNode;})($target, $C_);
          return $call2($Js_of_ocaml_Js[5][8], $D_, $B_);
        }
        return $target;
      }
      return $target;
    };
    $make = (dynamic $s) ==> {return $s->toString();};
    $Event = Vector{0, $make} as dynamic;
    $addEventListener = (dynamic $e, dynamic $typ, dynamic $h, dynamic $capt) ==> {
      $g_ = $Js_of_ocaml_Js[3];
      $h_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -245101619, 43), $x);
      };
      if (
        ((dynamic $t44, dynamic $param) ==> {return $t44->addEventListener;})($e, $h_) === $g_
      ) {
        $i_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -942667500, 44), $x);
        };
        $j_ = "on";
        $ev = ((dynamic $t43, dynamic $t42, dynamic $param) ==> {return $t43->concat($t42);
         })($j_, $typ, $i_);
        $callback = (dynamic $e) ==> {
          $o_ = Vector{0, $h, $e, Vector{0}} as dynamic;
          $p_ = (dynamic $u_, dynamic $t_, dynamic $s_) ==> {
            return $runtime["caml_js_call"]($u_, $t_, $s_);
          };
          return (dynamic $q_, dynamic $r_) ==> {return $p_($o_, $q_, $r_);};
        };
        $k_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -362647019, 45), $x);
        };
        (((dynamic $t41, dynamic $t39, dynamic $t40, dynamic $param) ==> {return $t41->attachEvent($t39, $t40);
          })($e, $ev, $callback, $k_));
        return (dynamic $param) ==> {
          $n_ = (dynamic $x) ==> {
            return $call1($caml_get_public_method($x, 681618887, 46), $x);
          };
          return ((dynamic $t38, dynamic $t36, dynamic $t37, dynamic $param) ==> {return $t38->detachEvent($t36, $t37);
           })($e, $ev, $callback, $n_);
        };
      }
      $l_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -245101619, 47), $x);
      };
      ((
        (dynamic $t35, dynamic $t32, dynamic $t33, dynamic $t34, dynamic $param) ==> {
          return $t35->addEventListener($t32, $t33, $t34);
        })($e, $typ, $h, $capt, $l_));
      return (dynamic $param) ==> {
        $m_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -713717814, 48), $x);
        };
        return (
         (dynamic $t31, dynamic $t28, dynamic $t29, dynamic $t30, dynamic $param) ==> {
           return $t31->removeEventListener($t28, $t29, $t30);
         })($e, $typ, $h, $capt, $m_);
      };
    };
    $removeEventListener = (dynamic $id) ==> {return $call1($id, 0);};
    $preventDefault = (dynamic $ev) ==> {
      $b_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -408605495, 49), $x);
      };
      $c_ = ((dynamic $t48, dynamic $param) ==> {return $t48->preventDefault;})($ev, $b_);
      if ($call1($Js_of_ocaml_Js[6][5], $c_)) {
        $d_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -408605495, 50), $x);
        };
        return ((dynamic $t47, dynamic $param) ==> {
           return $t47->preventDefault();
         })($ev, $d_);
      }
      $e_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 1049971873, 51), $x);
      };
      $f_ = ! ! 0;
      return ((dynamic $t46, dynamic $t45, dynamic $param) ==> {$t46->returnValue = $t45;return 0;
       })($ev, $f_, $e_);
    };
    $Js_of_ocaml_Dom = Vector{
      0,
      $DocumentPosition,
      $insertBefore,
      $replaceChild,
      $removeChild,
      $appendChild,
      $list_of_nodeList,
      $nodeType,
      Vector{0, $element, $text, $attr},
      $no_handler,
      $handler,
      $full_handler,
      $invoke_handler,
      $eventTarget,
      $Event,
      $addEventListener,
      $removeEventListener,
      $preventDefault
    } as dynamic;
    
    return($Js_of_ocaml_Dom);

  }
  public static function insertBefore(dynamic $p, dynamic $n, dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 2, $p, $n, $o);
  }
  public static function replaceChild(dynamic $p, dynamic $n, dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 3, $p, $n, $o);
  }
  public static function removeChild(dynamic $p, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 4, $p, $n);
  }
  public static function appendChild(dynamic $p, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 5, $p, $n);
  }
  public static function list_of_nodeList(dynamic $nodeList): dynamic {
    return static::syncCall(__FUNCTION__, 6, $nodeList);
  }
  public static function nodeType(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 7, $e);
  }
  public static function handler(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 10, $f);
  }
  public static function full_handler(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 11, $f);
  }
  public static function invoke_handler(dynamic $f, dynamic $this, dynamic $event): dynamic {
    return static::syncCall(__FUNCTION__, 12, $f, $this, $event);
  }
  public static function eventTarget(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 13, $e);
  }
  public static function addEventListener(dynamic $e, dynamic $typ, dynamic $h, dynamic $capt): dynamic {
    return static::syncCall(__FUNCTION__, 15, $e, $typ, $h, $capt);
  }
  public static function removeEventListener(dynamic $id): dynamic {
    return static::syncCall(__FUNCTION__, 16, $id);
  }
  public static function preventDefault(dynamic $ev): dynamic {
    return static::syncCall(__FUNCTION__, 17, $ev);
  }

}
/* Hashing disabled */
