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
    $Stdlib = Stdlib::get();
    $Js_of_ocaml_Import = Js_of_ocaml__Import::get();
    $Stdlib_list = Stdlib__list::get();
    $a_ = Vector{0, $string("lib/js_of_ocaml/dom.ml"), 351, 67} as dynamic;
    $list_of_nodeList = (dynamic $nodeList) : dynamic ==> {
      $aj_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 520590566, 24), $x);
      };
      $length = ((dynamic $t2, dynamic $param) : dynamic ==> {
         return $t2->length;
       })($nodeList, $aj_);
      $add_item = (dynamic $acc, dynamic $i) : dynamic ==> {
        $acc__0 = $acc;
        $i__0 = $i;
        for (;;) {
          if ($call2($Js_of_ocaml_Import[5], $i__0, $length)) {
            $ak_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, -977287917, 25), $x);
            };
            $al_ = ((dynamic $t1, dynamic $t0, dynamic $param) : dynamic ==> {return $t1->item($t0);
             })($nodeList, $i__0, $ak_);
            $match = $call1($Js_of_ocaml_Js[5][10], $al_);
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
          return $call1($Stdlib_list[9], $acc__0);
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
    $has = (dynamic $t, dynamic $mask) : dynamic ==> {
      return $call2($Js_of_ocaml_Import[8], $t & $mask, $mask);
    };
    $add = (dynamic $x, dynamic $y) : dynamic ==> {return $x | $y;};
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
    $appendChild = (dynamic $p, dynamic $n) : dynamic ==> {
      $ai_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 36716898, 26), $x);
      };
      (((dynamic $t4, dynamic $t3, dynamic $param) : dynamic ==> {
          return $t4->appendChild($t3);
        })($p, $n, $ai_));
      return 0;
    };
    $removeChild = (dynamic $p, dynamic $n) : dynamic ==> {
      $ah_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -1007843656, 27), $x);
      };
      (((dynamic $t6, dynamic $t5, dynamic $param) : dynamic ==> {
          return $t6->removeChild($t5);
        })($p, $n, $ah_));
      return 0;
    };
    $replaceChild = (dynamic $p, dynamic $n, dynamic $o) : dynamic ==> {
      $ag_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 961057992, 28), $x);
      };
      (((dynamic $t9, dynamic $t7, dynamic $t8, dynamic $param) : dynamic ==> {return $t9->replaceChild($t7, $t8);
        })($p, $n, $o, $ag_));
      return 0;
    };
    $insertBefore = (dynamic $p, dynamic $n, dynamic $o) : dynamic ==> {
      $af_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 281001112, 29), $x);
      };
      (((dynamic $t12, dynamic $t10, dynamic $t11, dynamic $param) : dynamic ==> {return $t12->insertBefore($t10, $t11);
        })($p, $n, $o, $af_));
      return 0;
    };
    $nodeType = (dynamic $e) : dynamic ==> {
      $ae_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -158969380, 30), $x);
      };
      $match = ((dynamic $t13, dynamic $param) : dynamic ==> {
         return $t13->nodeType;
       })($e, $ae_);
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
    $cast = (dynamic $e, dynamic $t) : dynamic ==> {
      $ad_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -158969380, 31), $x);
      };
      return ((dynamic $t14, dynamic $param) : dynamic ==> {
          return $t14->nodeType;
        })($e, $ad_) === $t
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $element = (dynamic $e) : dynamic ==> {return $cast($e, 1);};
    $text = (dynamic $e) : dynamic ==> {
      $ab_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -158969380, 32), $x);
      };
      if (
        3 !==
          ((dynamic $t15, dynamic $param) : dynamic ==> {
             return $t15->nodeType;
           })($e, $ab_)
      ) {
        $ac_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -158969380, 33), $x);
        };
        if (
          4 !==
            ((dynamic $t16, dynamic $param) : dynamic ==> {
               return $t16->nodeType;
             })($e, $ac_)
        ) {return $Js_of_ocaml_Js[1];}
      }
      return $call1($Js_of_ocaml_Js[2], $e);
    };
    $attr = (dynamic $e) : dynamic ==> {return $cast($e, 2);};
    $no_handler = $Js_of_ocaml_Js[1];
    $window_event = (dynamic $param) : dynamic ==> {return (event);};
    $handler = (dynamic $f) : dynamic ==> {
      $X_ = (dynamic $e) : dynamic ==> {
        $Y_ = $call1($Js_of_ocaml_Js[2], $e);
        if ($call1($Js_of_ocaml_Js[5][5], $Y_)) {
          $res = $call1($f, $e);
          if (1 - (int) $res) {
            $Z_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, -408605495, 34), $x);
            };
            (((dynamic $t17, dynamic $param) : dynamic ==> {
                return $t17->preventDefault();
              })($e, $Z_));
          }
          return $res;
        }
        $e__0 = $window_event(0);
        $res__0 = $call1($f, $e__0);
        if (1 - (int) $res__0) {
          $aa_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, 1049971873, 35), $x);
          };
          (((dynamic $t19, dynamic $t18, dynamic $param) : dynamic ==> {
              $t19->returnValue = $t18;
              return 0;
            })($e__0, $res__0, $aa_));
        }
        return $res__0;
      };
      return $call1($Js_of_ocaml_Js[2], $X_);
    };
    $full_handler = (dynamic $f) : dynamic ==> {
      $T_ = $runtime["caml_js_wrap_meth_callback_unsafe"](
        (dynamic $this__0, dynamic $e) : dynamic ==> {
          $U_ = $call1($Js_of_ocaml_Js[2], $e);
          if ($call1($Js_of_ocaml_Js[5][5], $U_)) {
            $res = $call2($f, $this__0, $e);
            if (1 - (int) $res) {
              $V_ = (dynamic $x) : dynamic ==> {
                return $call1($caml_get_public_method($x, -408605495, 36), $x);
              };
              (((dynamic $t20, dynamic $param) : dynamic ==> {
                  return $t20->preventDefault();
                })($e, $V_));
            }
            return $res;
          }
          $e__0 = $window_event(0);
          $res__0 = $call2($f, $this__0, $e__0);
          if (1 - (int) $res__0) {
            $W_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, 1049971873, 37), $x);
            };
            (((dynamic $t22, dynamic $t21, dynamic $param) : dynamic ==> {
                $t22->returnValue = $t21;
                return 0;
              })($e__0, $res__0, $W_));
          }
          return $res__0;
        }
      );
      return $call1($Js_of_ocaml_Js[2], $T_);
    };
    $invoke_handler = (dynamic $f, dynamic $this__0, dynamic $event) : dynamic ==> {
      return $f->call($this__0, $event);
    };
    $eventTarget = (dynamic $e) : dynamic ==> {
      $H_ = (dynamic $param) : dynamic ==> {
        $Q_ = (dynamic $param) : dynamic ==> {
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        };
        $R_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -1021537224, 38), $x);
        };
        $S_ = ((dynamic $t27, dynamic $param) : dynamic ==> {
           return $t27->srcElement;
         })($e, $R_);
        return $call2($Js_of_ocaml_Js[5][8], $S_, $Q_);
      };
      $I_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 116192081, 39), $x);
      };
      $J_ = ((dynamic $t26, dynamic $param) : dynamic ==> {
         return $t26->target;
       })($e, $I_);
      $target = $call2($Js_of_ocaml_Js[5][8], $J_, $H_);
      $K_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -420195839, 40), $x);
      };
      $L_ = $Js_of_ocaml_Js[50][1];
      if (
        instance_of
         ($target,
          ((dynamic $t25, dynamic $param) : dynamic ==> {return $t25->Node;})($L_, $K_))
      ) {
        $M_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -158969380, 41), $x);
        };
        if (
          3 ===
            ((dynamic $t24, dynamic $param) : dynamic ==> {
               return $t24->nodeType;
             })($target, $M_)
        ) {
          $N_ = (dynamic $param) : dynamic ==> {
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
          };
          $O_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -400811956, 42), $x);
          };
          $P_ = ((dynamic $t23, dynamic $param) : dynamic ==> {
             return $t23->parentNode;
           })($target, $O_);
          return $call2($Js_of_ocaml_Js[5][8], $P_, $N_);
        }
        return $target;
      }
      return $target;
    };
    $make = (dynamic $s) : dynamic ==> {return $s->toString();};
    $Event = Vector{0, $make} as dynamic;
    $addEventListenerWithOptions = 
    (dynamic $e, dynamic $typ, dynamic $capture, dynamic $once, dynamic $passive, dynamic $h) : dynamic ==> {
      $p_ = $Js_of_ocaml_Js[3];
      $q_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -245101619, 43), $x);
      };
      if (
        ((dynamic $t50, dynamic $param) : dynamic ==> {
           return $t50->addEventListener;
         })($e, $q_) === $p_
      ) {
        $r_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -942667500, 44), $x);
        };
        $s_ = "on";
        $ev = ((dynamic $t49, dynamic $t48, dynamic $param) : dynamic ==> {return $t49->concat($t48);
         })($s_, $typ, $r_);
        $callback = (dynamic $e) : dynamic ==> {
          $A_ = Vector{0, $h, $e, Vector{0}} as dynamic;
          $B_ = (dynamic $G_, dynamic $F_, dynamic $E_) : dynamic ==> {
            return $runtime["caml_js_call"]($G_, $F_, $E_);
          };
          return (dynamic $C_, dynamic $D_) : dynamic ==> {
            return $B_($A_, $C_, $D_);
          };
        };
        $t_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -362647019, 45), $x);
        };
        (((dynamic $t47, dynamic $t45, dynamic $t46, dynamic $param) : dynamic ==> {return $t47->attachEvent($t45, $t46);
          })($e, $ev, $callback, $t_));
        return (dynamic $param) : dynamic ==> {
          $z_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, 681618887, 46), $x);
          };
          return ((dynamic $t44, dynamic $t42, dynamic $t43, dynamic $param) : dynamic ==> {return $t44->detachEvent($t42, $t43);
           })($e, $ev, $callback, $z_);
        };
      }
      $opts = darray[];
      $iter = (dynamic $t, dynamic $f) : dynamic ==> {
        if ($t) {$b = $t[1];return $call1($f, $b);}
        return 0;
      };
      $iter(
        $capture,
        (dynamic $b) : dynamic ==> {
          $y_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, 659673222, 47), $x);
          };
          return ((dynamic $t41, dynamic $t40, dynamic $param) : dynamic ==> {
             $t41->capture = $t40;
             return 0;
           })($opts, $b, $y_);
        }
      );
      $iter(
        $once,
        (dynamic $b) : dynamic ==> {
          $x_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -911049343, 48), $x);
          };
          return ((dynamic $t39, dynamic $t38, dynamic $param) : dynamic ==> {$t39->once = $t38;return 0;
           })($opts, $b, $x_);
        }
      );
      $iter(
        $passive,
        (dynamic $b) : dynamic ==> {
          $w_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -43366489, 49), $x);
          };
          return ((dynamic $t37, dynamic $t36, dynamic $param) : dynamic ==> {
             $t37->passive = $t36;
             return 0;
           })($opts, $b, $w_);
        }
      );
      $u_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -245101619, 50), $x);
      };
      ((
        (dynamic $t35, dynamic $t32, dynamic $t33, dynamic $t34, dynamic $param) : dynamic ==> {
          return $t35->addEventListener($t32, $t33, $t34);
        })($e, $typ, $h, $opts, $u_));
      return (dynamic $param) : dynamic ==> {
        $v_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -713717814, 51), $x);
        };
        return (
         (dynamic $t31, dynamic $t28, dynamic $t29, dynamic $t30, dynamic $param) : dynamic ==> {
           return $t31->removeEventListener($t28, $t29, $t30);
         })($e, $typ, $h, $opts, $v_);
      };
    };
    $addEventListener = (dynamic $e, dynamic $typ, dynamic $h, dynamic $capt) : dynamic ==> {
      return $addEventListenerWithOptions($e, $typ, Vector{0, $capt}, 0, 0, $h
      );
    };
    $removeEventListener = (dynamic $id) : dynamic ==> {
      return $call1($id, 0);
    };
    $preventDefault = (dynamic $ev) : dynamic ==> {
      $k_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -408605495, 52), $x);
      };
      $l_ = ((dynamic $t54, dynamic $param) : dynamic ==> {
         return $t54->preventDefault;
       })($ev, $k_);
      if ($call1($Js_of_ocaml_Js[6][5], $l_)) {
        $m_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -408605495, 53), $x);
        };
        return ((dynamic $t53, dynamic $param) : dynamic ==> {
           return $t53->preventDefault();
         })($ev, $m_);
      }
      $n_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1049971873, 54), $x);
      };
      $o_ = ! ! 0;
      return ((dynamic $t52, dynamic $t51, dynamic $param) : dynamic ==> {
         $t52->returnValue = $t51;
         return 0;
       })($ev, $o_, $n_);
    };
    $createCustomEvent = 
    (dynamic $bubbles, dynamic $cancelable, dynamic $detail, dynamic $typ) : dynamic ==> {
      $opt_iter = (dynamic $f, dynamic $param) : dynamic ==> {
        if ($param) {$x = $param[1];return $call1($f, $x);}
        return 0;
      };
      $opts = darray[];
      $opt_iter(
        (dynamic $x) : dynamic ==> {
          $i_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -514409625, 55), $x);
          };
          $j_ = ! ! $x;
          return ((dynamic $t64, dynamic $t63, dynamic $param) : dynamic ==> {
             $t64->bubbles = $t63;
             return 0;
           })($opts, $j_, $i_);
        },
        $bubbles
      );
      $opt_iter(
        (dynamic $x) : dynamic ==> {
          $g_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -998662124, 56), $x);
          };
          $h_ = ! ! $x;
          return ((dynamic $t62, dynamic $t61, dynamic $param) : dynamic ==> {
             $t62->cancelable = $t61;
             return 0;
           })($opts, $h_, $g_);
        },
        $cancelable
      );
      $opt_iter(
        (dynamic $x) : dynamic ==> {
          $e_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -266378607, 57), $x);
          };
          $f_ = $call1($Js_of_ocaml_Js[2], $x);
          return ((dynamic $t60, dynamic $t59, dynamic $param) : dynamic ==> {
             $t60->detail = $t59;
             return 0;
           })($opts, $f_, $e_);
        },
        $detail
      );
      $b_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -717392758, 58), $x);
      };
      $c_ = $Js_of_ocaml_Js[50][1];
      $constr = ((dynamic $t58, dynamic $param) : dynamic ==> {
         return $t58->CustomEvent;
       })($c_, $b_);
      $d_ = 0 as dynamic;
      return ((dynamic $t57, dynamic $t55, dynamic $t56, dynamic $param) : dynamic ==> {return new $t57($t55, $t56);
       })($constr, $typ, $opts, $d_);
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
      $addEventListenerWithOptions,
      $addEventListener,
      $removeEventListener,
      $preventDefault,
      $createCustomEvent
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
  public static function addEventListenerWithOptions(dynamic $e, dynamic $typ, dynamic $capture, dynamic $once, dynamic $passive, dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 15, $e, $typ, $capture, $once, $passive, $h);
  }
  public static function addEventListener(dynamic $e, dynamic $typ, dynamic $h, dynamic $capt): dynamic {
    return static::syncCall(__FUNCTION__, 16, $e, $typ, $h, $capt);
  }
  public static function removeEventListener(dynamic $id): dynamic {
    return static::syncCall(__FUNCTION__, 17, $id);
  }
  public static function preventDefault(dynamic $ev): dynamic {
    return static::syncCall(__FUNCTION__, 18, $ev);
  }
  public static function createCustomEvent(dynamic $bubbles, dynamic $cancelable, dynamic $detail, dynamic $typ): dynamic {
    return static::syncCall(__FUNCTION__, 19, $bubbles, $cancelable, $detail, $typ);
  }

}
/* Hashing disabled */
